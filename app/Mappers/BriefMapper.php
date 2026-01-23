<?php

namespace app\Mappers;

use app\Models\Brief;
use app\Enums\BriefType;

class BriefMapper
{
    // convert db row to entity
    public static function toEntity(array $data): ?Brief
    {
        if (empty($data)) {
            return null;
        }

        try {
            $typeValue = strtoupper($data['type'] ?? 'INDIVIDUAL');
            $type = BriefType::from($typeValue);
        } catch (\ValueError | \TypeError $e) {
            $type = BriefType::INDIVIDUAL;
        }

        return new Brief(
            isset($data['id']) ? (int)$data['id'] : null,
            $data['title'] ?? '',
            $data['description'] ?? '',
            (int)($data['duration'] ?? 0),
            $type,
            isset($data['sprint_id']) ? (int)$data['sprint_id'] : null,
            $data['sprint_name'] ?? null
        );
    }

    //  entiity to  array
    public static function toArray(Brief $brief): array
    {
        return [
            'title'       => $brief->getTitle(),
            'description' => $brief->getDescription(),
            'duration'    => $brief->getDuration(),
            'type'        => $brief->getType()->value,
            'sprint_id'   => $brief->getSprintId()
        ];
    }
}