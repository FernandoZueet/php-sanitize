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

class CpfTest extends TestCase
{
    /**
     * Cpf filter
     *
     * @return void
     */
    public function testCpfSanitizer()
    {
        $this->assertEquals('437.409.990-55', Sanitize::cpf()->clean('43740999055'));
        
        $this->assertEquals('', Sanitize::cpf()->clean(10));
    }

}