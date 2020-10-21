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

class FilterVarTest extends TestCase
{
    /**
     * Filter var.
     * Filters a variable with a specified filter.
     *
     * @return void
     */
    public function testFilterVarSanitizer()
    {
        $this->assertEquals('test@test.com', Sanitize::filterVar(FILTER_SANITIZE_EMAIL)->clean('çótest@test.com'));
    }

}