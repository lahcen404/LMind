<?php

namespace app\Services;

use app\Repositories\EvaluationRepository;
use app\Models\Evaluation;
use app\Enums\MasteryLevel;
use app\Helpers\Validation;

class EvaluationService
{
    private static ?EvaluationService $instance = null;

    public static function getInstance(): EvaluationService
    {
        if (self::$instance === null) {
            self::$instance = new EvaluationService();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all evaluations
    public function getAllEvaluations(): array
    {
        $evaluationRepository = EvaluationRepository::getInstance();
        return $evaluationRepository->findAll();
    }

    // find evaluation by id
    public function getEvaluationById(int $id): ?Evaluation
    {
        $evaluationRepository = EvaluationRepository::getInstance();
        return $evaluationRepository->findById($id);
    }

    // get history of a student
    public function getLearnerProgress(int $learnerId): array
    {
        $evaluationRepository = EvaluationRepository::getInstance();
        return $evaluationRepository->findByLearner($learnerId);
    }

    // save evaluatioon
    public function saveEvaluation(array $data): bool
    {
        $evaluationRepository = EvaluationRepository::getInstance();

        $learnerId = (int)$data['learner_id'];
        $briefId = (int)$data['brief_id'];
        $skillId = (int)$data['skill_id'];
        $levelStr = strtoupper($data['level'] ?? '');
        $comment = Validation::clean($data['comment'] ?? '');

        try {
            
            $level = MasteryLevel::from($levelStr);
            $evaluation = new Evaluation(null, $learnerId, $briefId, $skillId, $level, $comment);
            return $evaluationRepository->save($evaluation);
        } catch (\ValueError $e) {
            return false;
        }
    }

    // update 
    public function updateEvaluation(int $id, array $data): bool
    {
        $evaluationRepository = EvaluationRepository::getInstance();
        $evaluation = $evaluationRepository->findById($id);

        if (!$evaluation) {
            return false;
        }

        $levelStr = strtoupper($data['level'] ?? '');
        $comment = Validation::clean($data['comment'] ?? '');

        try {
            $evaluation->setLevel(MasteryLevel::from($levelStr));
            $evaluation->setComment($comment);
            return $evaluationRepository->update($id, $evaluation);
        } catch (\ValueError $e) {
            return false;
        }
    }

    // delete evaluation
    public function deleteEvaluation(int $id): bool
    {
        $evaluationRepository = EvaluationRepository::getInstance();
        return $evaluationRepository->remove($id);
    }
}