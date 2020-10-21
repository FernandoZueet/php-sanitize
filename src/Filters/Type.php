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

class Type extends Filters implements Filter
{
    /**
     * Types values
     * 
     * @param mixed $value 
     * @return mixed
     */
    public function clean($value)
    {  
        if($this->options[0] == 'string') {
            return (string) $value;
        }

        if($this->options[0] == 'bool') {
            if($value === 'true') {
                return true;
            } 
            if($value === 'false') {
                return false;
            } 
            return (bool) $value;
        }

        if($this->options[0] == 'int') {
            return (int) $value;
        }

        if($this->options[0] == 'float') {
            return (float) $value;
        }

        if($this->options[0] == 'array') {
            return is_array($value) || is_object($value) ? (array) $value : "";
        }

        if($this->options[0] == 'object') {
            return is_array($value) || is_object($value) ? (object) $value : "";
        }

        return "";
    }
    
}