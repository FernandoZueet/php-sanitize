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

namespace Tests;

use FzPhpSanitize\Sanitize;
use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase
{
    /**
     * Array sanitize
     */
    public function testFilterArraySanitize()
    {
        $data = [
            'title'   => 'Test Test é 123',
            'content' => "<a href=''>teste</a> <b>OK</b>",
            'test'    => "value test",
            'date'    => "01/06/1987",
            'sub'     => [
                "sub1" => "  TEST  "
            ],
        ];

        $rules = [
            'title'    => [Sanitize::strtolower(), Sanitize::alpha(true), Sanitize::strtoupper(), Sanitize::rtrim()],
            'content'  => [Sanitize::stripTags('<a>') ],
            'date'     => [Sanitize::date('Y-m-d')],
            'sub.sub1' => [Sanitize::strtolower(), Sanitize::trim()],
        ];

        $expected = [
            'title'   => "TEST TEST",
            'content' => "<a href=''>teste</a> OK",
            'test'    => "value test",
            'date'    => "1987-06-01",
            'sub'     => [
                'sub1' => 'test'
            ],
        ];

        $this->assertEquals($expected, Sanitize::clear($data, $rules));
    }

}