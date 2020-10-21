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

class StrtolowerTest extends TestCase
{
    /**
     * Filter strtolower.
     * Make a string lowercase
     *
     * @return void
     */
    public function testStrtolowerSanitizer()
    {
        $this->assertEquals('fernando zueet', Sanitize::strtolower()->clean('FERNANDO ZUEET'));

        $this->assertEquals('', Sanitize::strtolower()->clean(10));
    }

}