<?php

namespace app\Models;

class TrainingClass
{
    private ?int $id;
    private string $name;
    private string $promotion;
    private ?int $trainerId;
    private ?string $trainerName;

    public function __construct(?int $id, string $name, string $promotion, ?int $trainerId = null, ?string $trainerName = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->promotion = $promotion;
        $this->trainerId = $trainerId;
        $this->trainerName = $trainerName;
    }

    // geetters
    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getPromotion(): string { return $this->promotion; }
    public function getTrainerId(): ?int { return $this->trainerId; }
    public function getTrainerName(): ?string { return $this->trainerName; }

    // seetters
    public function setName(string $name): void { $this->name = $name; }
    public function setPromotion(string $promotion): void { $this->promotion = $promotion; }
    public function setTrainerId(?int $trainerId): void { $this->trainerId = $trainerId; }
}