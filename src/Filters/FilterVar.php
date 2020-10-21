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

class FilterVar extends Filters implements Filter
{
    /**
     * Filter var.
     * Filters a variable with a specified filter.
     * 
     * @param string $value
     * @return mixed
     */
    public function clean($value)
    {
        return filter_var($value, $this->options[0], $this->options[1] ?? null);
    }

}