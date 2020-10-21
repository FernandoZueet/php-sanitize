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

class Striptags extends Filters implements Filter
{
    /**
     * Filter strip tags.
     * Strip HTML and PHP tags from a string.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {  
        return is_string($value) ? strip_tags($value, $this->options[0] ?? null) : "";
    }
    
}