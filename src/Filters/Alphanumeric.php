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

class Alphanumeric extends Filters implements Filter
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
        $space = $this->options[0] ? "\s" : "";

        return is_string($value) ? preg_replace("/[^[:alnum:]$space]/", '', $value) : "";
    }
    
}