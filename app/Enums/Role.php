<?php

namespace app\Enums;

enum Role: string{
    case ADMIN = 'ADMIN';
    case LEARNER = 'LEARNER';
    case TRAINER = 'TRAINER';
}