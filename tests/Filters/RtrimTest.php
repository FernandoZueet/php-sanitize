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

class RtrimTest extends TestCase
{
    /**
     * Filter rtrim.
     * Removes blanks (or other characters) from the end of the string.
     *
     * @return void
     */
    public function testRtrimSanitizer()
    {
        $this->assertEquals('fernando zueet', Sanitize::rtrim()->clean('fernando zueet    '));

        $this->assertEquals('', Sanitize::rtrim()->clean(10));
    }

}