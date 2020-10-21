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

class UcfirstTest extends TestCase
{
    /**
     * Filter ucfirst.
     * Make a string's first character uppercase.
     *
     * @return void
     */
    public function testUcfirstSanitizer()
    {
        $this->assertEquals('Fernando zueet', Sanitize::ucfirst()->clean('fernando zueet'));

        $this->assertEquals('', Sanitize::ucfirst()->clean(10));
    }

}