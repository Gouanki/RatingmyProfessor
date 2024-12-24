<?php

namespace App\Rules;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NoProfanity
{
    public static function make()
    {
        return function ($attribute, $value, $fail) {
            $profanityList = [
                'fuck', 'arse',
                ' arsehead',
                'arsehole',
                ' ass',
                ' asshole', 'bastard', 'bitch', ' bloody', 'bollocks',' brotherfucker', 'bugger', 'bullshit', '
                damn',
               ' damn it',
                'dick', 'hit'
            ];

            foreach ($profanityList as $profanity) {
                if (stripos($value, $profanity) !== false) {
                    return $fail('Your comment contains profanity.');
                }
            }
        };
    }
}
