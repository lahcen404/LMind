<?php

namespace app\Services;

use app\Repositories\ClassRepository;
use app\Models\TrainingClass;
use app\Helpers\Validation;

class ClassService
{
    private static ?ClassService $instance = null;
   

    public static function getInstance(): ClassService
    {
        if (self::$instance === null) {
            self::$instance = new ClassService();
        }
        return self::$instance;
    }

  

    public function getAllClasses(): array
    {
        $classRepository = ClassRepository::getInstance();

        return $classRepository->findAll();
    }

    public function getClassById(int $id): ?TrainingClass
    {
        $classRepository = ClassRepository::getInstance();

        return $classRepository->findById($id);
    }

    public function createClass(array $data): bool
    {
        $classRepository = ClassRepository::getInstance();

        $name = Validation::clean($data['name'] ?? '');
        $promotion = Validation::clean($data['promotion'] ?? '');
        $trainerId = !empty($data['trainer_id']) ? (int)$data['trainer_id'] : null;

        if (empty($name) || empty($promotion)) {
            return false;
        }

        $class = new TrainingClass(null, $name, $promotion, $trainerId);

        return $classRepository->save($class);
    }

    public function updateClass(int $id, array $data): bool
    {
        $classRepository = ClassRepository::getInstance();

        $class = $classRepository->findById($id);
        if (!$class) {
            return false;
        }

        $name = Validation::clean($data['name'] ?? '');
        $promotion = Validation::clean($data['promotion'] ?? '');
        $trainerId = !empty($data['trainer_id']) ? (int)$data['trainer_id'] : null;

        if (empty($name) || empty($promotion)) {
            return false;
        }

        $class->setName($name);
        $class->setPromotion($promotion);
        $class->setTrainerId($trainerId);

        return $classRepository->update($class);
    }

    public function deleteClass(int $id): bool
    {
        $classRepository = ClassRepository::getInstance();

        return $classRepository->delete($id);
    }
}