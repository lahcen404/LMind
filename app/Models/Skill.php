<?php

namespace app\Models;

use app\Enums\SkillCategory;

class Skill
{
    private ?int $id;
    private string $code;
    private string $description;
    private SkillCategory $category;

    public function __construct(?int $id, string $code, string $description, SkillCategory $category)
    {
        $this->id = $id;
        $this->code = $code;
        $this->description = $description;
        $this->category = $category;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getCode(): string { return $this->code; }
    public function getDescription(): string { return $this->description; }
    public function getCategory(): SkillCategory { return $this->category; }

    // settters
    public function setCode(string $code): void { $this->code = $code; }
    public function setDescription(string $description): void { $this->description = $description; }
    public function setCategory(SkillCategory $category): void { $this->category = $category; }
}