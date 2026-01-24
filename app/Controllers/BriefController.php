<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Helpers\debug;
use app\Services\BriefService;
use app\Services\SkillService;
use app\Services\SprintService;


class BriefController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // list all briefs
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

    // view brief detaiiils
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
        
        //skill details for linkeed skills
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
}