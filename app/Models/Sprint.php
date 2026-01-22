<?php

namespace app\Models;

class Sprint
{
    private ?int $id;
    private string $name;
    private int $duration;
    private int $orderSprint;
    private int $classId;
    private ?string $className; 

    public function __construct(
        ?int $id,
        string $name,
        int $duration,
        int $orderSprint,
        int $classId,
        ?string $className = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->orderSprint = $orderSprint;
        $this->classId = $classId;
        $this->className = $className;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getDuration(): int { return $this->duration; }
    public function getOrderSprint(): int { return $this->orderSprint; }
    public function getClassId(): int { return $this->classId; }
    public function getClassName(): ?string { return $this->className; }

    // setters
    public function setName(string $name): void { $this->name = $name; }
    public function setDuration(int $duration): void { $this->duration = $duration; }
    public function setOrderSprint(int $orderSprint): void { $this->orderSprint = $orderSprint; }
    public function setClassId(int $classId): void { $this->classId = $classId; }
}