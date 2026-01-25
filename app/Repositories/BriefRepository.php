<?php

namespace app\Repositories;

use app\DAOs\BriefDAO;
use app\Mappers\BriefMapper;
use app\Models\Brief;

class BriefRepository
{
    private static ?BriefRepository $instance = null;

    public static function getInstance(): BriefRepository
    {
        if (self::$instance === null) {
            self::$instance = new BriefRepository();
        }
        return self::$instance;
    }

    private function __construct() {}

    // find all
    public function findAll(): array
    {
        $briefDAO = BriefDAO::getInstance();
        $rawData = $briefDAO->getAll();
        $briefs = [];
        foreach($rawData as $row){
            $briefs[] = BriefMapper::toEntity($row);
        }
        return $briefs;
    }

    // find by id
    public function findById(int $id): ?Brief
    {
        $briefDAO = BriefDAO::getInstance();
        $data = $briefDAO->findById($id);
        return $data ? BriefMapper::toEntity($data) : null;
    }

    // save
    public function save(Brief $brief): bool
    {
        $briefDAO = BriefDAO::getInstance();
        return $briefDAO->create(BriefMapper::toArray($brief));
    }

    // update
    public function update(int $id, Brief $brief): bool
    {
        $briefDAO = BriefDAO::getInstance();
        return $briefDAO->update($id, BriefMapper::toArray($brief));
    }

    // delete
    public function remove(int $id): bool
    {
        $briefDAO = BriefDAO::getInstance();
        return $briefDAO->delete($id);
    }

    // sync skills
    public function syncSkills(int $briefId, array $skillIds): bool
    {
        $briefDAO = BriefDAO::getInstance();
        return $briefDAO->syncSkills($briefId, $skillIds);
    }

    // get skill ids
    public function getSkillIds(int $briefId): array
    {
        $briefDAO = BriefDAO::getInstance();
        return $briefDAO->getSkillIds($briefId);
    }

    public function assignToSprint(int $briefId, int $sprintId): bool
    {
        return BriefDAO::getInstance()->updateSprintId($briefId, $sprintId);
    }
    
    public function findUnassigned(): array
    {
        $rawData = BriefDAO::getInstance()->getUnassigned();
        return array_map([BriefMapper::class, 'toEntity'], $rawData);
    }

}