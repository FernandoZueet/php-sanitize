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

class Cnpj extends Filters implements Filter
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
        return is_string($value) ? preg_replace('/^([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{4})([0-9]{2})$/', '$1.$2.$3/$4-$5', $value) : "";
    }
    
}