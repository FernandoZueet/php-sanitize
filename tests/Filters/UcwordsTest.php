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

class UcwordsTest extends TestCase
{
    /**
     * Filter ucwords.
     * Uppercase the first character of each word in a string.
     *
     * @return void
     */
    public function testUcwordsSanitizer()
    {
        $this->assertEquals('Fernando Zueet', Sanitize::ucwords()->clean('fernando zueet'));

        $this->assertEquals('', Sanitize::ucwords()->clean(10));
    }

}