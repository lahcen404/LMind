<?php

namespace app\Services;

use app\Repositories\SkillRepository;
use app\Models\Skill;
use app\Enums\SkillCategory;
use app\Helpers\Validation;

class SkillService
{
    private static ?SkillService $instance = null;

    public static function getInstance(): SkillService
    {
        if (self::$instance === null) {
            self::$instance = new SkillService();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all skiills
    public function getAllSkills(): array
    {
        $skillRepository = SkillRepository::getInstance();
        return $skillRepository->findAll();
    }

    // find by id
    public function getSkillById(int $id): ?Skill
    {
        $skillRepository = SkillRepository::getInstance();
        return $skillRepository->findById($id);
    }

    // add new skill
    public function addSkill(array $data): bool
    {
        $skillRepository = SkillRepository::getInstance();

        $code = strtoupper(Validation::clean($data['code'] ?? ''));
        $description = Validation::clean($data['description'] ?? '');
        $categoryStr = strtoupper($data['category'] ?? '');

        // basic validaaation
        if (empty($code) || empty($description) || empty($categoryStr)) {
            return false;
        }

        try {
            $category = SkillCategory::from($categoryStr);
            $skill = new Skill(null, $code, $description, $category);
            return $skillRepository->save($skill);
        } catch (\ValueError $e) {
            return false;
        }
    }

    // update skill
    public function updateSkill(int $id, array $data): bool
    {
        $skillRepository = SkillRepository::getInstance();
        $skill = $skillRepository->findById($id);

        if (!$skill) return false;

        $code = strtoupper(Validation::clean($data['code'] ?? ''));
        $description = Validation::clean($data['description'] ?? '');
        $categoryStr = strtoupper($data['category'] ?? '');

        if (empty($code) || empty($description) || empty($categoryStr)) {
            return false;
        }

        try {
            $skill->setCode($code);
            $skill->setDescription($description);
            $skill->setCategory(SkillCategory::from($categoryStr));
            
            return $skillRepository->update($id, $skill);
        } catch (\ValueError $e) {
            return false;
        }
    }

    // delete skiill
    public function deleteSkill(int $id): bool
    {
        $skillRepository = SkillRepository::getInstance();
        return $skillRepository->remove($id);
    }
}