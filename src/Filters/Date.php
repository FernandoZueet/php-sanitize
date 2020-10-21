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

class Date extends Filters implements Filter
{
    /**
     * Filter date.
     * Date format
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {
        if(!is_string($value)) {
            return $value;
        }

        try {
            $data = new \DateTime(date(str_replace("/", "-", $value)));
            return $data->format($this->options[0]);
            
        } catch (\Exception $e) {
            return $value;
        }
    }

}