<?php

namespace app\Repositories;

use app\DAOs\SkillDAO;
use app\Mappers\SkillMapper;
use app\Models\Skill;

class SkillRepository
{
    private static ?SkillRepository $instance = null;

    
    public static function getInstance(): SkillRepository
    {
        if (self::$instance === null) {
            self::$instance = new SkillRepository();
        }
        return self::$instance;
    }

    private function __construct() {}

    // find all Skillls
    public function findAll(): array
    {
        $skillDAO = SkillDAO::getInstance();
        $rawData = $skillDAO->getAll();
        
        return array_map([SkillMapper::class, 'toEntity'], $rawData);
    }

    // find skill by id
    public function findById(int $id): ?Skill
    {
        $skillDAO = SkillDAO::getInstance();
        $data = $skillDAO->findById($id);
        
        return $data ? SkillMapper::toEntity($data) : null;
    }

    // save skill
    public function save(Skill $skill): bool
    {
        $skillDAO = SkillDAO::getInstance();
        $data = SkillMapper::toArray($skill);
        
        return $skillDAO->create($data);
    }

    // update skiiill
    public function update(int $id, Skill $skill): bool
    {
        $skillDAO = SkillDAO::getInstance();
        $data = SkillMapper::toArray($skill);
        
        return $skillDAO->update($id, $data);
    }

    // delete skill
    public function remove(int $id): bool
    {
        $skillDAO = SkillDAO::getInstance();
        return $skillDAO->delete($id);
    }
}