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

class CnpjTest extends TestCase
{
    /**
     * Cnpj format
     *
     * @return void
     */
    public function testCnpjSanitizer()
    {
        $this->assertEquals('54.465.939/0001-50', Sanitize::cnpj()->clean('54465939000150'));

        $this->assertEquals('', Sanitize::cnpj()->clean(10));
    }

}