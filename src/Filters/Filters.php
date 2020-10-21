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

abstract class Filters
{
    /**
     * Filter options
     *
     * @var array
     */
    public $options = [];

    /**
     * Class instance
     *
     * @param array ...$options
     */
    public function __construct(...$options)
    {
        $this->options = $options;

        return $this; 
    }
    
}