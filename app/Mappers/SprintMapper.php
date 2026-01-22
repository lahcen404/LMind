<?php

namespace app\Mappers;

use app\Models\Sprint;

class SprintMapper
{
    // db row to entity
    public static function toEntity(array $data): ?Sprint
    {
        if (empty($data)) {
            return null;
        }

        return new Sprint(
            isset($data['id']) ? (int)$data['id'] : null,
            $data['name'] ?? '',
            (int)($data['duration'] ?? 0),
            (int)($data['order_sprint'] ?? $data['order_Sprint'] ?? 0),
            (int)($data['class_id'] ?? $data['class_Id'] ?? 0),
            $data['class_name'] ?? null
        );
    }

    // entiiity to db array
    public static function toArray(Sprint $sprint): array
    {
        return [
            'name'         => $sprint->getName(),
            'duration'     => $sprint->getDuration(),
            'order_sprint' => $sprint->getOrderSprint(),
            'class_id'     => $sprint->getClassId()
        ];
    }
}