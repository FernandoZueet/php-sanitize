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

namespace FzPhpSanitize\Contracts;

interface Filter
{
    /**
     * Sanitize value
     *
     * @param mixed $value
     * @return mixed
     */
    public function clean($value);
    
}