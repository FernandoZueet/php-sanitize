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

class LcfirstTest extends TestCase
{
    /**
     * Filter lcfirst.
     * Make a string's first character lowercase.
     *
     * @return void
     */
    public function testLcfirstSanitizer()
    {
        $this->assertEquals('fernando zueet', Sanitize::lcfirst()->clean('Fernando zueet'));

        $this->assertEquals("", Sanitize::lcfirst()->clean(10));
    }

}