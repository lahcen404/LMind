<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Services\EvaluationService;
use app\Services\BriefService;
use app\Services\UserService;
use app\Services\SkillService;
use app\Services\ClassService;

class EvaluationController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    
    public function index()
    {
        $classService = ClassService::getInstance();
        $userService = UserService::getInstance();
        $briefService = BriefService::getInstance();

       
        $classes = $classService->getAllClasses();
        
        
        $selectedClassId = isset($_GET['class_id']) ? (int)$_GET['class_id'] : null;
        
        
        $learners = [];
        if ($selectedClassId) {
            $learners = $userService->getLearnersByClass($selectedClassId);
        }

        
        $briefs = $briefService->getAllBriefs();

        View::render('trainer.evaluations.index', [
            'classes' => $classes,
            'learners' => $learners,
            'briefs' => $briefs,
            'selectedClassId' => $selectedClassId 
        ]);
    }

    // create evaluation
    public function create()
    {
        $briefService = BriefService::getInstance();
        $userService = UserService::getInstance();
        $skillService = SkillService::getInstance();

        $briefId = isset($_GET['brief_id']) ? (int)$_GET['brief_id'] : null;
        $learnerId = isset($_GET['learner_id']) ? (int)$_GET['learner_id'] : null;

        if (!$briefId || !$learnerId) {
            header('Location: /trainer/evaluations');
            exit();
        }

        $brief = $briefService->getBriefById($briefId);
        $learner = $userService->getUserById($learnerId);
        
        if (!$brief || !$learner) {
            header('Location: /trainer/evaluations');
            exit();
        }
        
       
        $linkedSkillIds = $briefService->getBriefSkillIds($briefId);
        $allSkills = $skillService->getAllSkills();
        
        $briefSkills = array_filter($allSkills, function($s) use ($linkedSkillIds) {
            return in_array($s->getId(), $linkedSkillIds);
        });

        View::render('trainer.evaluations.form', [
            'brief' => $brief,
            'learner' => $learner,
            'briefSkills' => $briefSkills
        ]);
    }

    // process batch skill evaluations
    public function store()
    {
        $evaluationService = EvaluationService::getInstance();

        $briefId = (int)$_POST['brief_id'];
        $learnerId = (int)$_POST['learner_id'];
        $skillsData = $_POST['skills'] ?? [];

        // save each competency level individually
        foreach ($skillsData as $skillId => $data) {
            $evalData = [
                'learner_id' => $learnerId,
                'brief_id' => $briefId,
                'skill_id' => (int)$skillId,
                'level' => $data['level'] ?? '',
                'comment' => $data['comment'] ?? ''
            ];

            $evaluationService->saveEvaluation($evalData);
        }

        $_SESSION['success'] = "Pedagogical debriefing saved successfully";
        header('Location: /trainer/evaluations');
        exit();
    }

    // display historical results for a student
    public function history()
    {
        $evaluationService = EvaluationService::getInstance();
        $userService = UserService::getInstance();

        $learnerId = isset($_GET['learner_id']) ? (int)$_GET['learner_id'] : null;
        
        if (!$learnerId) {
            header('Location: /trainer/evaluations');
            exit();
        }

        $learner = $userService->getUserById($learnerId);
        $evaluations = $evaluationService->getLearnerProgress($learnerId);

        View::render('trainer.evaluations.history', [
            'learner' => $learner,
            'evaluations' => $evaluations
        ]);
    }
}