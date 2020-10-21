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

class Numeric extends Filters implements Filter
{
    /**
     * Filter preg_replace.
     * Perform a regular expression search and replace.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {  
        return is_string($value) ? preg_replace('/[^0-9]/', '', $value) : "";
    }
    
}