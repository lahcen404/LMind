<?php

namespace app\Repositories;

use app\DAOs\SprintDAO;
use app\Mappers\SprintMapper;
use app\Models\Sprint;

class SprintRepository
{
    private static ?SprintRepository $instance = null;

    public static function getInstance(): SprintRepository
    {
        if (self::$instance === null) {
            self::$instance = new SprintRepository();
        }
        return self::$instance;
    }

    private function __construct() {}

    // find all
    public function findAll(): array
    {
        $sprintDAO = SprintDAO::getInstance();
        $rawData = $sprintDAO->getAll();
        $classes = [];
        foreach($rawData as $row){
            $classes[] = SprintMapper::toEntity($row);
        }

        return $classes;
    }

    // find Sprint by id
    public function findById(int $id): ?Sprint
    {
        $sprintDAO = SprintDAO::getInstance();
        $data = $sprintDAO->findById($id);
        
        return $data ? SprintMapper::toEntity($data) : null;
    }

    // create Sprint
    public function save(Sprint $sprint): bool
    {
        $sprintDAO = SprintDAO::getInstance();
        $data = SprintMapper::toArray($sprint);
        
        return $sprintDAO->create($data);
    }

    // update Spiint
    public function update(int $id, Sprint $sprint): bool
    {
        $sprintDAO = SprintDAO::getInstance();
        $data = SprintMapper::toArray($sprint);
        
        return $sprintDAO->update($id, $data);
    }

    // delete Spriint
    public function delete(int $id): bool
    {
        $sprintDAO = SprintDAO::getInstance();
        return $sprintDAO->delete($id);
    }
}