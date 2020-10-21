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

class DateTest extends TestCase
{
    public function values() : array
    {
        return [
            ["Y-m-d", "01/06/1987", "1987-06-01"],
            ["d-m-Y", "1987-06-01", "01-06-1987"],
            ["Y", "1987-06-01", "1987"],
            ["Y", "01/06/1987", "1987"],
            ["Y-m-d H:i:s", "01/06/1987 09:04:56", "1987-06-01 09:04:56"],
            ["Y-m-d", "01/06/1987 09:04:56", "1987-06-01"],
            ["H:i:s", "01/06/1987 09:04:56", "09:04:56"],
            ["Y-m-d", "", date("Y-m-d")],
            ["Y-m-d", "dfsafads", "dfsafads"],
            ["Y-m-d", "01/20/1987", "01/20/1987"],
            ["Y-m-d", 10, 10],
        ];
    }

    /**
     * Filter date.
     * Date format.
     * 
     * @dataProvider values
     * @param string $format
     * @param string $value
     * @param string $expected
     *
     * @return void
     */
    public function testDateSanitizer(string $format, $value, $expected)
    {
        $this->assertEquals($expected, Sanitize::date($format)->clean($value));
    }

}