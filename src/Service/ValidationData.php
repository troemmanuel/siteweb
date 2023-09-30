<?php

class ValidationData
{

    public static function verificationPassword(?string $password):bool
    {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        return $uppercase && $lowercase && $number && $specialChars && strlen($password) > 8;
    }

    public static function verificationEmail(?string $email):bool
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public static function stringNotEmpty(string $value):bool
    {
        return !empty($value);
    }

}