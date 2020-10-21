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

class NumberFormat extends Filters implements Filter
{
    /**
     * Filter number format.
     * Format a number with grouped thousands.
     * 
     * @param float $value
     * @return string
     */
    public function clean($value)
    {
        return number_format($value, $this->options[0], $this->options[1], $this->options[2]);
    }

}