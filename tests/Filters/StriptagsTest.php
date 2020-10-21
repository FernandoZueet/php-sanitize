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

class StriptagsTest extends TestCase
{
    public function values() : array
    {
        return [
            ["<a href='#'>Link</a> <h1>Hello world!</h1>", "<a>", "<a href='#'>Link</a> Hello world!"],
            ["<a href='#'>Link</a> <h1>Hello world!</h1>", "", "Link Hello world!"],
            ["<a href='#'>Link</a> <h1><b>Hello</b> world!</h1>", ['<a>','<b>'], "<a href='#'>Link</a> <b>Hello</b> world!"],
            [10, "", ""],
        ];
    }

    /**
     * Strip HTML and PHP tags from a string.
     *
     * @dataProvider values
     * @param string $value
     * @param array|string $tags
     * @param string $expected
     * @return void
     */
    public function testStriptagsSanitizer($value, $tags, string $expected)
    {
        $this->assertEquals($expected, Sanitize::striptags($tags)->clean($value));
    }

}