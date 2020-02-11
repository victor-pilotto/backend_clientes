<?php

namespace App\Application\Presenter;

use ICanBoogie\Inflector;

class ArrayKeys
{
    /**
     * @param array $values
     * @return array
     */
    public static function toSnakeCase(array $values) : array
    {
        $arrayFormatted = [];
        foreach ($values as $key => $value) {
            if (\is_array($value)) {
                $value = static::toSnakeCase($value);
            }

            $keyFormatted = \is_string($key) ? Inflector::get()->underscore($key) : $key;

            $arrayFormatted[$keyFormatted] = $value;
        }

        return $arrayFormatted;
    }
}
