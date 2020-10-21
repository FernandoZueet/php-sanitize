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

class Ucwords extends Filters implements Filter
{
    /**
     * Filter ucwords.
     * Uppercase the first character of each word in a string.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {
        return is_string($value) ? ucwords($value, $this->options[0]) : "";
    }

}