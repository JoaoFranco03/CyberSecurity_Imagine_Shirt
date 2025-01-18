<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotCommonPassword implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $commonPasswords = include(resource_path('common-passwords.php'));
        
        // Convert both input and common passwords to lowercase for comparison
        $lowercaseValue = strtolower($value);
        $lowercasePasswords = array_map('strtolower', $commonPasswords);
        
        // Direct match check
        if (in_array($lowercaseValue, $lowercasePasswords, true)) {
            $fail('This is a commonly used password. Please choose something more unique.');
            return;
        }
        
        // Pattern checks
        $patterns = [
            '/^password\d*[@!#$%^&*]*/i',
            '/^admin\d*[@!#$%^&*]*/i',
            '/^welcome\d*[@!#$%^&*]*/i',
            '/^[a-z]+123[@!#$%^&*]/i',
            '/^[a-z]+\d{3,4}[@!#$%^&*]/i',
            '/^(spring|summer|fall|winter)\d{4}[@!#$%^&*]/i',
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $value)) {
                $fail('This password follows a common pattern. Please choose something more unique.');
                return;
            }
        }
        
        // Base word check
        $strippedValue = preg_replace('/[^a-z]/i', '', $lowercaseValue);
        $commonBaseWords = ['password', 'admin', 'welcome', 'login', 'user', 'test', 'system'];
        
        if (in_array($strippedValue, $commonBaseWords, true)) {
            $fail('This password contains a common word. Please choose a more unique combination.');
            return;
        }
        
        // Check for sequential numbers
        if (preg_match('/123|234|345|456|567|678|789|987|876|765|654|543|432|321/', $value)) {
            $fail('This password contains sequential numbers. Please use a less predictable combination.');
            return;
        }
    }
}
