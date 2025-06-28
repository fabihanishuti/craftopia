<?php

namespace App\Enums;

class UserRole {
    public const ADMIN = 1;
    public const USER = 0;

    public static function isAdmin(int $role): bool {
        return $role === self::ADMIN;
    }

    public static function isUser(int $role): bool {
        return $role === self::USER;
    }

    public static function getRole(int $role): string {
        return match ($role) {
            self::ADMIN => 'admin',
            self::USER => 'user',
        };
    }

    public static function getLabelText(int $role): string {
        return match ($role) {
            self::ADMIN => 'Admin',
            self::USER => 'User',
        };
    }
}
