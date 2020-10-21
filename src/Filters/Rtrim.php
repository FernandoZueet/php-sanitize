<?php

/**
 * This file is part of the FZ Php Sanitize package.
 *
 * @see http://github.com/fernandozueet/php-sanitize
 *
 * @copyright 2020
 * @license MIT License
 * @author Fernando Zueet <fernandozueet@hotmail.com>
 */

namespace FzPhpSanitize\Filters;

use FzPhpSanitize\Contracts\Filter;

class Rtrim extends Filters implements Filter
{
    /**
     * Filter rtrim.
     * Removes blanks (or other characters) from the end of the string.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {
        return is_string($value) ? rtrim($value, $this->options[0]) : "";
    }

}