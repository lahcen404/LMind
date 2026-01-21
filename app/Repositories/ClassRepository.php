<?php

namespace app\Repositories;

use app\DAOs\ClassDAO;
use app\Mappers\ClassMapper;
use app\Models\TrainingClass;

class ClassRepository
{
    private static ?ClassRepository $instance = null;

   

    public static function getInstance(): ClassRepository
    {
        if (self::$instance === null) {
            self::$instance = new ClassRepository();
        }
        return self::$instance;
    }

    
    public function findAll(): array
    {
        $classDAO = ClassDAO::getInstance();
        $rawData = $classDAO->getAll();
        $classes = [];
        
        foreach ($rawData as $row) {
            $classes[] = ClassMapper::toEntity($row);
        }
        
        return $classes;
    }

    
    public function findById(int $id): ?TrainingClass
    {
        $classDAO = ClassDAO::getInstance();

        $data = $classDAO->findById($id);
        return $data ? ClassMapper::toEntity($data) : null;
    }

   
    public function save(TrainingClass $class): bool
    {
        $classDAO = ClassDAO::getInstance();

        $data = ClassMapper::toArray($class);
        return $classDAO->create($data);
    }

    
    public function update(TrainingClass $class): bool
    {
        $classDAO = ClassDAO::getInstance();

        if (!$class->getId()) return false;
        
        $data = ClassMapper::toArray($class);
        return $classDAO->update($class->getId(), $data);
    }

    
    public function delete(int $id): bool
    {
        $classDAO = ClassDAO::getInstance();

        return $classDAO->delete($id);
    }
}