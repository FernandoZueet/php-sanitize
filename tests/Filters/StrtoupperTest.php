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

class StrtoupperTest extends TestCase
{
    /**
     * Filter strtoupper.
     * Make a string uppercase.
     *
     * @return void
     */
    public function testStrtoupperSanitizer()
    {
        $this->assertEquals('FERNANDO ZUEET', Sanitize::strtoupper()->clean('fernando zueet'));

        $this->assertEquals('', Sanitize::strtoupper()->clean(10));
    }

}