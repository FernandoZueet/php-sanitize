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

class PregReplaceTest extends TestCase
{
    /**
     * Make a string lowercase
     *
     * @return void
     */
    public function testPregReplaceSanitizer()
    {
        $this->assertEquals('asdfg', Sanitize::pregReplace('/[^A-Za-z]/', '')->clean('1234asdfg'));
    }

}