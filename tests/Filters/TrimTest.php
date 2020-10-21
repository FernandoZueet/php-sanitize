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

class TrimTest extends TestCase
{
    /**
     * Filter trim.
     * Removing space at the beginning and end of a string.
     *
     * @return void
     */
    public function testTrimSanitizer()
    {
        $this->assertEquals('fernando zueet', Sanitize::trim()->clean('   fernando zueet   '));

        $this->assertEquals('', Sanitize::trim()->clean(10));
    }

}