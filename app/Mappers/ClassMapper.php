<?php

namespace app\Mappers;

use app\Models\TrainingClass;

class ClassMapper
{
    
    public static function toEntity(array $data): ?TrainingClass
    {
        if (empty($data)) {
            return null;
        }

        return new TrainingClass(
            isset($data['id']) ? (int)$data['id'] : null,
            $data['name'] ?? '',
            $data['promotion'] ?? '',
            isset($data['trainer_id']) ? (int)$data['trainer_id'] : null,
            $data['trainer_name'] ?? 'Unassiigned'
        );
    }

    
    public static function toArray(TrainingClass $class): array
    {
        return [
            'name' => $class->getName(),
            'promotion' => $class->getPromotion(),
            'trainer_id' => $class->getTrainerId()
        ];
    }
}