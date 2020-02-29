<?php

namespace Czechphp\ICOValidator;

use function preg_match;
use function preg_replace;
use function str_split;

/**
 * Used sources
 *
 * @link https://cs.wikipedia.org/wiki/Identifika%C4%8Dn%C3%AD_%C4%8D%C3%ADslo_osoby
 * @link https://phpfashion.com/jak-overit-platne-ic-a-rodne-cislo
 */
final class ICOValidator
{
    public const ERROR_NONE = 0;
    public const ERROR_FORMAT = 1;
    public const ERROR_MODULO = 2;

    public function validate(string $value): int
    {
        // clean input
        $value = preg_replace('/\s+/', '', $value);

        if (preg_match('/^\d{8}$/', $value) !== 1) {
            return self::ERROR_FORMAT;
        }

        $chars = str_split($value);
        $sum = 0;

        for ($i = 0, $w = 8; $i < 7; $i++, $w--) {
            $sum += $chars[$i] * $w;
        }

        $modulo = $sum % 11;

        if ($modulo === 0) {
            $c = 1;
        } elseif ($modulo === 1) {
            $c = 0;
        } else {
            $c = 11 - $modulo;
        }

        if ((int) $chars[7] !== $c) {
            return self::ERROR_MODULO;
        }

        return self::ERROR_NONE;
    }
}
