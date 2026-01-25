<?php

namespace app\Models;

use app\Enums\MasteryLevel;

class Evaluation
{
    private ?int $id;
    private int $learnerId;
    private int $briefId;
    private int $skillId;
    private MasteryLevel $level;
    private ?string $comment;
    private ?string $createdAt;

    private ?string $learnerName;
    private ?string $skillCode;
    private ?string $briefTitle;

    public function __construct(
        ?int $id,
        int $learnerId,
        int $briefId,
        int $skillId,
        MasteryLevel $level,
        ?string $comment = null,
        ?string $createdAt = null,
        ?string $learnerName = null,
        ?string $skillCode = null,
        ?string $briefTitle = null
    ) {
        $this->id = $id;
        $this->learnerId = $learnerId;
        $this->briefId = $briefId;
        $this->skillId = $skillId;
        $this->level = $level;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
        $this->learnerName = $learnerName;
        $this->skillCode = $skillCode;
        $this->briefTitle = $briefTitle;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getLearnerId(): int { return $this->learnerId; }
    public function getBriefId(): int { return $this->briefId; }
    public function getSkillId(): int { return $this->skillId; }
    public function getLevel(): MasteryLevel { return $this->level; }
    public function getComment(): ?string { return $this->comment; }
    public function getCreatedAt(): ?string { return $this->createdAt; }

    // getters
    public function getLearnerName(): ?string { return $this->learnerName; }
    public function getSkillCode(): ?string { return $this->skillCode; }
    public function getBriefTitle(): ?string { return $this->briefTitle; }

    // seetters 
    public function setLevel(MasteryLevel $level): void { $this->level = $level; }
    public function setComment(?string $comment): void { $this->comment = $comment; }
}