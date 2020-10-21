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

class AlphanumericTest extends TestCase
{
    /**
     * Alphanumeric format
     *
     * @return void
     */
    public function testAlphanumericSanitizer()
    {
        $this->assertEquals('asdfg123456', Sanitize::alphanumeric()->clean('!@#asdfg123456'));

        $this->assertEquals('asdfg 123 456', Sanitize::alphanumeric(true)->clean('!@#asdfg 123 456'));

        $this->assertEquals('', Sanitize::alphanumeric()->clean(10));
    }

}