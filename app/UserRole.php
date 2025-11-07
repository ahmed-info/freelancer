<?php
// app/Enums/UserRole.php

namespace App\Enums;

enum UserRole: string
{
    case PROJECT = 'project';
    case FREELANCE = 'freelance';
    case COMPANY = 'company';

    public function label(): string
    {
        return match($this) {
            self::PROJECT => 'صاحب مشروع',
            self::FREELANCE => 'مقدم خدمة',
            self::COMPANY=> 'صاحب شركة'
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
