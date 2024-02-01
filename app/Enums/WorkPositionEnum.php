<?php

namespace App\Enums;

enum WorkPositionEnum: int
{
    case TEACHER = 1;
    case SENIOR_TEACHER = 2;
    case DOCENT = 3;
    case PROFESSOR = 4;

    public function name(): string
    {
        return match($this) {
            self::TEACHER => 'Преподаватель',
            self::SENIOR_TEACHER => 'Старший преподаватель',
            self::DOCENT => 'Доцент',
            self::PROFESSOR => 'Профессор',
        };
    }

}
