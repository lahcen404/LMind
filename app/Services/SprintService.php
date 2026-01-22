<?php

namespace app\Services;

use app\Repositories\SprintRepository;
use app\Models\Sprint;
use app\Helpers\Validation;

class SprintService
{
    private static ?SprintService $instance = null;

    public static function getInstance(): SprintService
    {
        if (self::$instance === null) {
            self::$instance = new SprintService();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all sprints
    public function getAllSprints(): array
    {
        $sprintRepository = SprintRepository::getInstance();
        return $sprintRepository->findAll();
    }

    // find by id
    public function getSprintById(int $id): ?Sprint
    {
        $sprintRepository = SprintRepository::getInstance();
        return $sprintRepository->findById($id);
    }

    // add spriiint
    public function addSprint(array $data): bool
    {
        $sprintRepository = SprintRepository::getInstance();

        $name = Validation::clean($data['name'] ?? '');
        $duration = (int)($data['duration'] ?? 0);
        $orderSprint = (int)($data['order_sprint'] ?? 0);
        $classId = (int)($data['class_id'] ?? 0);

        if (empty($name) || $duration <= 0 || $classId <= 0) {
            return false;
        }

        $sprint = new Sprint(null, $name, $duration, $orderSprint, $classId);
        return $sprintRepository->save($sprint);
    }

    // update spriint
    public function updateSprint(int $id, array $data): bool
    {
        $sprintRepository = SprintRepository::getInstance();

        $sprint = $sprintRepository->findById($id);
        if (!$sprint) {
            return false;
        }

        $name = Validation::clean($data['name'] ?? '');
        $duration = (int)($data['duration'] ?? 0);
        $orderSprint = (int)($data['order_sprint'] ?? 0);
        $classId = (int)($data['class_id'] ?? 0);

        if (empty($name) || $duration <= 0 || $classId <= 0) {
            return false;
        }

        $sprint->setName($name);
        $sprint->setDuration($duration);
        $sprint->setOrderSprint($orderSprint);
        $sprint->setClassId($classId);

        return $sprintRepository->update($id, $sprint);
    }

    // delete spriint
    public function deleteSprint(int $id): bool
    {
        $sprintRepository = SprintRepository::getInstance();
        return $sprintRepository->delete($id);
    }
}