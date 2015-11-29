<?php

if (!function_exists('env')) {
    /**
     * @param string $varname
     * @param mixed  $default
     *
     * @return mixed
     */
    function env($varname, $default = null)
    {
        if (($value = getenv($varname)) === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'false':
                return false;

            case 'true':
                return true;

            case 'null':
                return;
        }

        if (preg_match('/^"(.*)"$/', $value, $matches)) {
            return $matches[1];
        }

        return $value;
    }
}

if (!function_exists('value')) {
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}
