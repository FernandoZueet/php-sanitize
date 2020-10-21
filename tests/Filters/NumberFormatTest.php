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

namespace Tests\Filters;

use FzPhpSanitize\Sanitize;
use PHPUnit\Framework\TestCase;

class NumberFormatTest extends TestCase
{
    /**
     * Filter number format.
     * Format a number with grouped thousands.
     * 
     * @return void
     */
    public function testNumberFormatSanitizer()
    {
        $this->assertEquals('1.000,00', Sanitize::numberFormat(2, ',', '.')->clean('1000'));
    }

}