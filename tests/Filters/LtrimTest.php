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

class LtrimTest extends TestCase
{
    /**
     * Filter ltrim.
     * Removes blanks (or other characters) from the beginning of the string.
     *
     * @return void
     */
    public function testLtrimSanitizer()
    {
        $this->assertEquals('fernando zueet', Sanitize::ltrim()->clean('   fernando zueet'));

        $this->assertEquals('', Sanitize::ltrim()->clean(10));
    }

}