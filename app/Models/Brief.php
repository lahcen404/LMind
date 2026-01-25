<?php

namespace app\Models;

use app\Enums\BriefType;

class Brief
{
    private ?int $id;
    private string $title;
    private string $description;
    private int $duration;
    private BriefType $type;
    private ?int $sprintId;
    private ?string $sprintName; 

    public function __construct(
        ?int $id,
        string $title,
        string $description,
        int $duration,
        BriefType $type,
        ?int $sprintId = null,
        ?string $sprintName = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
        $this->type = $type;
        $this->sprintId = $sprintId;
        $this->sprintName = $sprintName;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getDescription(): string { return $this->description; }
    public function getDuration(): int { return $this->duration; }
    public function getType(): BriefType { return $this->type; }
    public function getSprintId(): ?int { return $this->sprintId; }
    public function getSprintName(): ?string { return $this->sprintName; }

    // seeeters
    public function setTitle(string $title): void { $this->title = $title; }
    public function setDescription(string $description): void { $this->description = $description; }
    public function setDuration(int $duration): void { $this->duration = $duration; }
    public function setType(BriefType $type): void { $this->type = $type; }
    public function setSprintId(?int $sprintId): void { $this->sprintId = $sprintId; }
}