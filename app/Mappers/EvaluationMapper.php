<?php

namespace app\Mappers;

use app\Models\Evaluation;
use app\Enums\MasteryLevel;

class EvaluationMapper
{
    // roow to entity
    public static function toEntity(array $data): ?Evaluation
    {
        if (empty($data)) {
            return null;
        }

        return new Evaluation(
            isset($data['id']) ? (int)$data['id'] : null,
            (int)$data['learner_id'],
            (int)$data['brief_id'],
            (int)$data['skill_id'],
            MasteryLevel::from(strtoupper($data['level'])),
            $data['comment'] ?? null,
            $data['created_at'] ?? null,
            $data['learner_name'] ?? null,
            $data['skill_code'] ?? null,
            $data['brief_title'] ?? null
        );
    }

    // entity to array
    public static function toArray(Evaluation $evaluation): array
    {
        return [
            'learner_id' => $evaluation->getLearnerId(),
            'brief_id'   => $evaluation->getBriefId(),
            'skill_id'   => $evaluation->getSkillId(),
            'level'      => $evaluation->getLevel()->value,
            'comment'    => $evaluation->getComment()
        ];
    }
}