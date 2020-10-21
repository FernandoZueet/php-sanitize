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

class AlphaTest extends TestCase
{
    /**
     * Alpha format
     *
     * @return void
     */
    public function testAlphaSanitizer()
    {
        $this->assertEquals('asdfg', Sanitize::alpha()->clean('123456asdfg*&('));

        $this->assertEquals('as dfg', Sanitize::alpha(true)->clean('123456as dfg*&('));

        $this->assertEquals('', Sanitize::alpha()->clean(10));
    }

}