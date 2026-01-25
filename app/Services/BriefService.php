<?php

namespace app\Services;

use app\Repositories\BriefRepository;
use app\Models\Brief;
use app\Enums\BriefType;
use app\Helpers\Validation;

class BriefService
{
    private static ?BriefService $instance = null;

    public static function getInstance(): BriefService
    {
        if (self::$instance === null) {
            self::$instance = new BriefService();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all briefs
    public function getAllBriefs(): array
    {
        $briefRepository = BriefRepository::getInstance();
        return $briefRepository->findAll();
    }

    // get brief by id
    public function getBriefById(int $id): ?Brief
    {
        $briefRepository = BriefRepository::getInstance();
        return $briefRepository->findById($id);
    }

    // add brief
    public function addBrief(array $data): bool
    {
        $briefRepository = BriefRepository::getInstance();

        $title = Validation::clean($data['title'] ?? '');
        $description = Validation::clean($data['description'] ?? '');
        $duration = (int)($data['duration'] ?? 0);
        $typeStr = strtoupper($data['type'] ?? 'INDIVIDUAL');
        $sprintId = !empty($data['sprint_id']) ? (int)$data['sprint_id'] : null;

        if (empty($title) || empty($description) || $duration <= 0) {
            return false;
        }

        try {
            $type = BriefType::from($typeStr);
            $brief = new Brief(null, $title, $description, $duration, $type, $sprintId);
            return $briefRepository->save($brief);
        } catch (\ValueError $e) {
            return false;
        }
    }

    // update brief
    public function updateBrief(int $id, array $data): bool
    {
        $briefRepository = BriefRepository::getInstance();
        $brief = $briefRepository->findById($id);

        if (!$brief) return false;

        $title = Validation::clean($data['title'] ?? '');
        $description = Validation::clean($data['description'] ?? '');
        $duration = (int)($data['duration'] ?? 0);
        $typeStr = strtoupper($data['type'] ?? 'INDIVIDUAL');
        $sprintId = !empty($data['sprint_id']) ? (int)$data['sprint_id'] : null;

        if (empty($title) || empty($description) || $duration <= 0) {
            return false;
        }

        try {
            $brief->setTitle($title);
            $brief->setDescription($description);
            $brief->setDuration($duration);
            $brief->setType(BriefType::from($typeStr));
            $brief->setSprintId($sprintId);

            return $briefRepository->update($id, $brief);
        } catch (\ValueError $e) {
            return false;
        }
    }

    // delete briief
    public function deleteBrief(int $id): bool
    {
        $briefRepository = BriefRepository::getInstance();
        return $briefRepository->remove($id);
    }

    // syncc skills
    public function syncBriefSkills(int $briefId, array $skillIds): bool
    {
        $briefRepository = BriefRepository::getInstance();
        return $briefRepository->syncSkills($briefId, $skillIds);
    }

    // get linked skill ids
    public function getBriefSkillIds(int $briefId): array
    {
        $briefRepository = BriefRepository::getInstance();
        return $briefRepository->getSkillIds($briefId);
    }

    public function getAvailableBriefs(): array
    {
        return BriefRepository::getInstance()->findUnassigned();
    }

     public function assignBriefToSprint(int $briefId, int $sprintId): bool
    {
        if ($briefId <= 0 || $sprintId <= 0) {
            return false;
        }

        $repo = BriefRepository::getInstance();
        return $repo->assignToSprint($briefId, $sprintId);
    }
}