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

class Lcfirst extends Filters implements Filter
{
    /**
     * Filter lcfirst.
     * Make a string's first character lowercase.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {
        return is_string($value) ? lcfirst($value) : "";
    }

}