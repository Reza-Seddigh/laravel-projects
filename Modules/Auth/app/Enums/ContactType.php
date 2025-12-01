<?php

namespace Modules\Auth\Enums;

enum ContactType: string
{
    case Email = 'email';
    case Phone = 'phone';

    public static function detectedContactType(string $contact): self
    {
        if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
            return self::Email;
        }

        return self::Phone;

    }
}
