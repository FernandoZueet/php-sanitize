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
use stdClass;

class TypeTest extends TestCase
{
    public function values() : array
    {
        $object = (object) [
            'level1' => [
                'level2' => 'value'
            ]
        ];

        return [
            //string
            [10, "string", "10"],
            [true, "string", "1"],
            [false, "string", ""],
            ["test", "string", "test"],

            //bool
            ["true", "bool", true],
            ["false", "bool", false],
            ["test test", "bool", true],
            [1, "bool", true],
            [0, "bool", false],

            //int
            ["1234", "int", 1234],
            [true, "int", 1],
            [false, "int", 0],
            ['test test', "int", 0],
            [123, "int", 123],

            //float
            ["100.5", "float", 100.5],
            [100.5, "float", 100.5],

            //array
            [['test' => 'value test'], "array", ['test' => 'value test']],
            [$object, "array", ['level1' => ['level2' => 'value']]],

            //object
            [$object, "object", $object],
            [['level1' => ['level2' => 'value']], "object", $object],
        ];
    }

    /**
     * Filter types values.
     *
     * @dataProvider values
     * @param mixed $value
     * @param string $type
     * @param mixed $expected
     * @return void
     */
    public function testTypeSanitizer($value, string $type, $expected)
    {
        $this->assertEquals($expected, Sanitize::type($type)->clean($value));
    }

}