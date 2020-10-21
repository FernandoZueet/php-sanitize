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

class EmailTest extends TestCase
{
    /**
     * Filter email.
     *
     * @return void
     */
    public function testEmailSanitizer()
    {
        $this->assertEquals('test@test.com', Sanitize::email()->clean('çótest@test.com'));

        $this->assertEquals('', Sanitize::email()->clean(10));
    }

}