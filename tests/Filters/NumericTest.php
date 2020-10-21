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

class NumericTest extends TestCase
{
    /**
     * Numeric format
     *
     * @return void
     */
    public function testNumericSanitizer()
    {
        $this->assertEquals('123456', Sanitize::numeric()->clean('asdfg123456'));
        
        $this->assertEquals('', Sanitize::numeric()->clean(10));
    }

}