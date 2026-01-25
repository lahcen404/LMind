<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Services\BriefService;
use app\Services\SkillService;
use app\Services\SprintService;
use app\Services\ClassService;

class BriefController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // list all briefs in the library
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $briefs = $briefService->getAllBriefs();

        View::render('trainer.briefs.index', ['briefs' => $briefs]);
    }

    // create brief form
    public function create()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $sprintService = SprintService::getInstance();
        $sprints = $sprintService->getAllSprints();

        View::render('trainer.briefs.create', ['sprints' => $sprints]);
    }

    // store new brief
    public function store()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();

        if ($briefService->addBrief($_POST)) {
            $_SESSION['success'] = "Brief created successfully";
            header('Location: /trainer/briefs');
        } else {
            $_SESSION['error'] = "Failed to create brief";
            header('Location: /trainer/briefs/create');
        }
        exit();
    }

    // view brief details
    public function details()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $skillService = SkillService::getInstance();
        
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $brief = $briefService->getBriefById($id);

        if (!$brief) {
            header('Location: /trainer/briefs');
            exit();
        }

        $linkedSkillIds = $briefService->getBriefSkillIds($id);
        $allSkills = $skillService->getAllSkills();
        
        $linkedSkills = [];
        foreach ($allSkills as $skill) {
            if (in_array($skill->getId(), $linkedSkillIds)) {
                $linkedSkills[] = $skill;
            }
        }

        View::render('trainer.briefs.show', [
            'brief' => $brief,
            'linkedSkills' => $linkedSkills
        ]);
    }

    // edit brief form
    public function edit()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $sprintService = SprintService::getInstance();
        
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $brief = $briefService->getBriefById($id);
        $sprints = $sprintService->getAllSprints();

        if (!$brief) {
            header('Location: /trainer/briefs');
            exit();
        }

        View::render('trainer.briefs.edit', [
            'brief' => $brief,
            'sprints' => $sprints
        ]);
    }

    // update brief
    public function update()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

        if ($briefService->updateBrief($id, $_POST)) {
            $_SESSION['success'] = "Brief updated successfully";
            header('Location: /trainer/briefs');
        } else {
            $_SESSION['error'] = "Failed to update brief";
            header('Location: /trainer/briefs/edit?id=' . $id);
        }
        exit();
    }

    // delete brief
    public function delete()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($briefService->deleteBrief($id)) {
            $_SESSION['success'] = "Brief deleted successfully";
        } else {
            $_SESSION['error'] = "Failed to delete brief";
        }

        header('Location: /trainer/briefs');
        exit();
    }

    // show skills linking matrix
    public function linkSkills()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $skillService = SkillService::getInstance();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $brief = $briefService->getBriefById($id);
        $allSkills = $skillService->getAllSkills();
        $currentSkillIds = $briefService->getBriefSkillIds($id);

        if (!$brief) {
            header('Location: /trainer/briefs');
            exit();
        }

        View::render('trainer.briefs.skills', [
            'brief' => $brief,
            'allSkills' => $allSkills,
            'currentSkillIds' => $currentSkillIds
        ]);
    }

    // save brief skills
    public function syncSkills()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();
        $briefId = isset($_POST['brief_id']) ? (int)$_POST['brief_id'] : null;
        $skillIds = $_POST['skill_ids'] ?? [];

        if ($briefService->syncBriefSkills($briefId, $skillIds)) {
            $_SESSION['success'] = "Skill matrix updated";
        } else {
            $_SESSION['error'] = "Failed to update skills";
        }

        header('Location: /trainer/briefs/details?id=' . $briefId);
        exit();
    }

  // assign 
    public function assign()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $classService = ClassService::getInstance();
        $sprintService = SprintService::getInstance();
        $briefService = BriefService::getInstance();

        // brief we will assign
        $briefId = isset($_GET['brief_id']) ? (int)$_GET['brief_id'] : null;
        $brief = $briefService->getBriefById($briefId);

        if (!$brief) {
            $_SESSION['error'] = "Project context required.";
            header('Location: /trainer/briefs');
            exit();
        }

        
        $classes = $classService->getAllClasses();

        $selectedClassId = isset($_GET['class_id']) ? (int)$_GET['class_id'] : null;
        $sprints = [];
        if ($selectedClassId) {
            $allSprints = $sprintService->getAllSprints();
            $sprints = array_filter($allSprints, function($s) use ($selectedClassId) {
                return $s->getClassId() === $selectedClassId;
            });
        }

        View::render('trainer.briefs.assign', [
            'brief' => $brief,
            'classes' => $classes,
            'sprints' => $sprints,
            'selectedClassId' => $selectedClassId
        ]);
    }

    
    public function processAssignment()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $briefService = BriefService::getInstance();

        $briefId = isset($_POST['brief_id']) ? (int)$_POST['brief_id'] : null;
        $sprintId = isset($_POST['sprint_id']) ? (int)$_POST['sprint_id'] : null;

        if ($briefService->assignBriefToSprint($briefId, $sprintId)) {
            $_SESSION['success'] = "Brief distributed to the class timeline.";
            header('Location: /trainer/briefs');
        } else {
            $_SESSION['error'] = "Failed to distribute brief.";
            header('Location: /trainer/briefs/assign?brief_id=' . $briefId);
        }
        exit();
    }
}