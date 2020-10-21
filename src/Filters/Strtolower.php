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

class Strtolower extends Filters implements Filter
{
    /**
     * Filter strtolower.
     * Make a string lowercase.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {
        return is_string($value) ? strtolower($value) : "";
    }

}