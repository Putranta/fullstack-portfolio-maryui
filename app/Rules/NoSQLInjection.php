<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoSQLInjection implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Daftar pola atau kata yang dilarang
        $patterns = [
            '/SELECT\s+\*/i',       // SELECT *
            '/DROP\s+TABLE/i',      // DROP TABLE
            '/DELETE\s+FROM/i',     // DELETE FROM
            '/INSERT\s+INTO/i',     // INSERT INTO
            '/UPDATE\s+\w+\s+SET/i', // UPDATE table SET
            '/--/',                 // Comment SQL injection
            '/;/',                  // Query separator
            '/\bOR\b\s+\d+=\d+/i',  // OR 1=1
            '/\bAND\b\s+\d+=\d+/i', // AND 1=1
            '/<\?/',
        ];

        // Periksa apakah ada pola yang cocok
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $value)) {
                $fail("The :attribute contains forbidden SQL keywords, patterns, or PHP tags.");
                return;
            }
        }
    }
}
