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

class UrlTest extends TestCase
{
    /**
     * Filter url.
     *
     * @return void
     */
    public function testUrlSanitizer()
    {
        $this->assertEquals('http://php.net/manual/en/function.htmlentities.php', Sanitize::url()->clean('http://php.net/manual/en/function.htmlentities.phpçù'));

        $this->assertEquals('', Sanitize::url()->clean(10));
    }

}