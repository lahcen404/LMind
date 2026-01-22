<?php

namespace app\Mappers;

use app\Models\Skill;
use app\Enums\SkillCategory;

class SkillMapper
{
    
    public static function toEntity(array $data): ?Skill
    {
        if (empty($data)) {
            return null;
        }

        return new Skill(
            isset($data['id']) ? (int)$data['id'] : null,
            $data['code'] ?? '',
            $data['description'] ?? '',
           
            SkillCategory::from(strtoupper($data['category']))
        );
    }

    public static function toArray(Skill $skill): array
    {
        return [
            'code'        => $skill->getCode(),
            'description' => $skill->getDescription(),
            'category'    => $skill->getCategory()->value
        ];
    }
}