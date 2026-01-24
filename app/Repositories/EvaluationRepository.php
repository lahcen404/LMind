<?php

namespace app\Repositories;

use app\DAOs\EvaluationDAO;
use app\Mappers\EvaluationMapper;
use app\Models\Evaluation;

class EvaluationRepository
{
    private static ?EvaluationRepository $instance = null;

    // get instance
    public static function getInstance(): EvaluationRepository
    {
        if (self::$instance === null) {
            self::$instance = new EvaluationRepository();
        }
        return self::$instance;
    }

    private function __construct() {}

    // find all with details
    public function findAll(): array
    {
        $evaluationDAO = EvaluationDAO::getInstance();
        $rawData = $evaluationDAO->getAllWithDetails();
        $evaluations = [];
        foreach($rawData as $row){
            $evaluations[] = EvaluationMapper::toEntity($row);
        }
        return $evaluations;
    }

    // find by id
    public function findById(int $id): ?Evaluation
    {
        $evaluationDAO = EvaluationDAO::getInstance();
        $data = $evaluationDAO->findById($id);
        return $data ? EvaluationMapper::toEntity($data) : null;
    }

    // find by learner
   public function findByLearner(int $learnerId): array
    {
        $evaluationDAO = EvaluationDAO::getInstance();
        $rawData = $evaluationDAO->getByLearner($learnerId);
        $evaluations = [];
        foreach ($rawData as $row) {
            $evaluations[] = EvaluationMapper::toEntity($row);
        }
        return $evaluations;
    }

    // save evaluation
    public function save(Evaluation $evaluation): bool
    {
        $evaluationDAO = EvaluationDAO::getInstance();
        $data = EvaluationMapper::toArray($evaluation);
        return $evaluationDAO->create($data);
    }

    // update evaluation
    public function update(int $id, Evaluation $evaluation): bool
    {
        $evaluationDAO = EvaluationDAO::getInstance();
        $data = EvaluationMapper::toArray($evaluation);
        return $evaluationDAO->update($id, $data);
    }

    // remove evaluation
    public function remove(int $id): bool
    {
        $evaluationDAO = EvaluationDAO::getInstance();
        return $evaluationDAO->delete($id);
    }
}