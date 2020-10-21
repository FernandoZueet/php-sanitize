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

namespace FzPhpSanitize;

use FzPhpSanitize\Filters\Cpf;
use FzPhpSanitize\Filters\Cnpj;
use FzPhpSanitize\Filters\Date;
use FzPhpSanitize\Filters\Trim;
use FzPhpSanitize\Filters\Alpha;
use FzPhpSanitize\Filters\Email;
use FzPhpSanitize\Filters\Ltrim;
use FzPhpSanitize\Filters\Rtrim;
use FzPhpSanitize\Filters\Lcfirst;
use FzPhpSanitize\Filters\Numeric;
use FzPhpSanitize\Filters\Ucfirst;
use FzPhpSanitize\Filters\Ucwords;
use FzPhpSanitize\Filters\FilterVar;
use FzPhpSanitize\Filters\Striptags;
use FzPhpSanitize\Filters\Strtolower;
use FzPhpSanitize\Filters\Strtoupper;
use FzPhpSanitize\Filters\PregReplace;
use FzPhpSanitize\Filters\Alphanumeric;
use FzPhpSanitize\Filters\NumberFormat;
use FzPhpSanitize\Filters\Type;
use FzPhpSanitize\Filters\Url;

class Sanitize
{
    /**
     * Sanitize array values
     *
     * @param array $data
     * @param array $rules
     * @return array
     */
    public static function clear(array $data, array $rules): array
    {
        foreach ($rules as $key => $value) {
            foreach ($value as $key2 => $value2) {
                data_set($data, $key, $value2->clean(data_get($data, $key)));
            }
        }

        return $data;
    }

    //------------------------------------------------------------
    //FILTERS
    //------------------------------------------------------------

    /**
     * Filter strtolower.
     * Make a string lowercase.
     * 
     * @link http://php.net/manual/en/function.strtolower.php
     * 
     * @return Strtolower
     */
    public static function strtolower(): Strtolower
    {
        return new Strtolower();
    }

    /**
     * Filter strtoupper.
     * Make a string uppercase.
     * 
     * @link http://php.net/manual/en/function.strtoupper.php
     *
     * @return Strtoupper
     */
    public static function strtoupper(): Strtoupper
    {
        return new Strtoupper();
    }

    /**
     * Filter ucwords.
     * Uppercase the first character of each word in a string.
     * 
     * @link http://php.net/manual/en/function.ucwords.php
     *
     * @param string $delimiters
     * @return Ucwords
     */
    public static function ucwords(string $delimiters = " \t\r\n\f\v"): Ucwords
    {
        return new Ucwords($delimiters);
    }

    /**
     * Filter ucfirst.
     * Make a string's first character uppercase.
     * 
     * @link http://php.net/manual/en/function.ucfirst.php
     *
     * @return Ucfirst
     */
    public static function ucfirst(): Ucfirst
    {
        return new Ucfirst();
    }

    /**
     * Filter lcfirst.
     * Make a string's first character lowercase.
     * 
     * @link http://php.net/manual/en/function.lcfirst.php
     *
     * @return Lcfirst
     */
    public static function lcfirst(): Lcfirst
    {
        return new Lcfirst();
    }

    /**
     * Filter strip_tags.
     * Strip HTML and PHP tags from a string.
     * 
     * @link http://php.net/manual/en/function.strip-tags.php
     *
     * @param array|string $allowable_tags
     * @return Striptags
     */
    public static function striptags($allowable_tags = ""): Striptags
    {
        return new Striptags($allowable_tags);
    }

    /**
     * Filter preg_replace.
     * Perform a regular expression search and replace.
     * 
     * @link http://php.net/manual/en/function.preg-replace.php
     *
     * @param mixed $patterns
     * @param mixed $replacements
     * @return PregReplace
     */
    public static function pregReplace($pattern, $replacement): PregReplace
    {
        return new PregReplace($pattern, $replacement);
    }

    /**
     * Filter cnpj.
     * 
     * @link http://php.net/manual/en/function.preg-replace.php
     *
     * @return Cnpj
     */
    public static function cnpj(): Cnpj
    {
        return new Cnpj();
    }

    /**
     * Filter cpf.
     * 
     * @link http://php.net/manual/en/function.preg-replace.php
     *
     * @return Cpf
     */
    public static function cpf(): Cpf
    {
        return new Cpf();
    }

    /**
     * Filter alpha.
     * Letters from a to z.
     * 
     * @link http://php.net/manual/en/function.preg-replace.php
     * 
     * @param bool $spaces
     * @return Alpha
     */
    public static function alpha(bool $spaces = false): Alpha
    {
        return new Alpha($spaces);
    }

    /**
     * Filter alphanumeric.
     * Letters from a to z and numbers.
     * 
     * @link http://php.net/manual/en/function.preg-replace.php
     *
     * @param bool $spaces
     * @return Alphanumeric
     */
    public static function alphanumeric(bool $spaces = false): Alphanumeric
    {
        return new Alphanumeric($spaces);
    }

    /**
     * Filter numeric.
     * 
     * @link http://php.net/manual/en/function.preg-replace.php
     *
     * @return Numeric
     */
    public static function numeric(): Numeric
    {
        return new Numeric();
    }

    /**
     * Filter trim.
     * Removing space at the beginning and end of a string.
     * 
     * @link http://php.net/manual/en/function.trim.php
     *
     * @param string $charlist
     * @return Trim
     */
    public static function trim(string $charlist = " \t\n\r\0\x0B"): Trim
    {
        return new Trim($charlist);
    }

    /**
     * Filter ltrim.
     * Removes blanks (or other characters) from the beginning of the string.
     * 
     * @link http://php.net/manual/en/function.ltrim.php
     *
     * @param string $charlist
     * @return Ltrim
     */
    public static function ltrim(string $charlist = " \t\n\r\0\x0B"): Ltrim
    {
        return new Ltrim($charlist);
    }

    /**
     * Filter rtrim.
     * Removes blanks (or other characters) from the end of the string.
     * 
     * @link http://php.net/manual/en/function.rtrim.php
     *
     * @param string $charlist
     * @return Rtrim
     */
    public static function rtrim(string $charlist = " \t\n\r\0\x0B"): Rtrim
    {
        return new Rtrim($charlist);
    }

    /**
     * Filter var.
     * Filters a variable with a specified filter.
     * 
     * @link http://php.net/manual/en/function.filter-var.php
     *
     * @param integer $filter
     * @param mixed $options
     * @return FilterVar
     */
    public static function filterVar(int $filter = FILTER_DEFAULT, $options = null): FilterVar 
    {
        return new FilterVar($filter, $options);
    }

    /**
     * Filter email.
     * Filter Sanitize email.
     * 
     * @link http://php.net/manual/en/function.filter-var.php
     *
     * @return Email
     */
    public static function email(): Email 
    {
        return new Email();
    }

    /**
     * Filter url.
     * Filter Sanitize url.
     * 
     * @link http://php.net/manual/en/function.filter-var.php
     *
     * @return Url
     */
    public static function url(): Url 
    {
        return new Url();
    }

    /**
     * Filter date.
     * Date format.
     * 
     * @link https://php.net/manual/en/class.datetime.php
     * 
     * @param string $format 
     * @return Date
     */
    public static function date(string $format = 'Y-m-d'): Date 
    {
        return new Date($format);
    }

    /**
     * Filter number format.
     * Format a number with grouped thousands.
     * 
     * @link http://php.net/manual/en/function.number-format.php
     * 
     * @param int $decimals
     * @param string $decimalapoint
     * @param string $separator
     * @return NumberFormat
     */
    public static function numberFormat(int $decimals = 0, string $decimalpoint = '.', string $separator = ','): NumberFormat 
    {
        return new NumberFormat($decimals, $decimalpoint, $separator);
    }

    /**
     * Types values
     *
     * @param string $type string bool int float array object
     * @return Type
     */
    public static function type(string $type): Type
    {
        return new Type($type);
    }

}