# FZ PHP SANITIZE

Sanitize php values. 

<br>
<hr>
<br>

## Documentation

- [Requirements](#requirements)
- [Installation](#installation)
- [Mode of use Array](#mode-of-use-array)
- [Mode of use Individual](#mode-of-use-individual)
- [Mode of use Laravel](#mode-of-use-laravel)
- [Custom filter](#custom-filter)
- [Filter striptags](#striptags)
- [Filter cnpj](#cnpj)
- [Filter cpf](#cpf)
- [Filter numeric](#numeric)
- [Filter alphanumeric](#alphanumeric)
- [Filter alpha](#alpha)
- [Filter url](#url)
- [Filter email](#email)
- [Filter strtolower](#strtolower)
- [Filter strtoupper](#strtoupper)
- [Filter ucwords](#ucwords)
- [Filter ucfirst](#ucfirst)
- [Filter lcfirst](#lcfirst)
- [Filter rtrim](#rtrim)
- [Filter ltrim](#ltrim)
- [Filter trim](#trim)
- [Filter date](#date)
- [Filter type](#type)
- [Filter numberFormat](#numberFormat)
- [Filter pregReplace](#pregReplace)
- [Filter filterVar](#filterVar)
- [Contributing](#contributing)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

<br>
<hr>
<br>

## Requirements

- PHP 7.3 or superior
- Composer

<br>
<hr>
<br>

## Installation

Install this package with composer:

```bash
composer require fernandozueet/php-sanitize
```

<br>
<hr>
<br>

## Mode of use Array

```php
use FzPhpSanitize\Sanitize;

//values array
$data = [
    'title'   => 'Test Test é 123',
    'content' => "<a href=''>teste</a> <b>OK</b>",
    'test'    => "value test",
    'date'    => "01/06/1987",
    'sub'     => [
        "sub1" => "  TEST  "
    ],
];

//rules sanitize
$rules = [
    'title'    => [Sanitize::strtolower(), Sanitize::alpha(true), Sanitize::strtoupper(), Sanitize::rtrim()],
    'content'  => [Sanitize::stripTags('<a>') ],
    'date'     => [Sanitize::date('Y-m-d')],
    'sub.sub1' => [Sanitize::strtolower(), Sanitize::trim()],
];

//sanitize values
$values = Sanitize::clear($data, $rules);
```
Output:

```json
{
    "title": "TEST TEST",
    "content": "<a href=''>teste</a> OK",
    "teste": "value test",
    "date": "1987-06-01",
    "sub": {
        "sub1": "test"
    }
}
```

<br>
<hr>
<br>

## Mode of use Individual

```php
use FzPhpSanitize\Sanitize;

//sanitize
$value = Sanitize::cpf()->clean('43740999055');
```
Output:

```json
437.409.990-55
```

<br>
<hr>
<br>

## Mode of use Laravel

Laravel 5.8 or superior

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use FzPhpSanitize\Sanitize;

class ExampleRequest extends FormRequest
{

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $rules = [
            'title'   => [Sanitize::strtolower(), Sanitize::alpha(true), Sanitize::strtoupper(), Sanitize::rtrim()],
            'content' => [Sanitize::stripTags('<a>') ],
        ];

        $this->merge(Sanitize::clear($this->input(), $rules));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    } 

}
```

<br>
<hr>
<br>

## Custom filter

1- Create class filter

```php
MyFilter.php

<?php

namespace Filters\MyFilter; // <<<<<<<<<-- Your namespace here

use FzPhpSanitize\Contracts\Filter;
use FzPhpSanitize\Filters\Filters;

class MyFilter extends Filters implements Filter
{
  
    /**
     * Filter strip tags.
     * Strip HTML and PHP tags from a string.
     * 
     * @param string $value
     * @return string
     */
    public function clean($value)
    {  
       return is_string($value) ? strip_tags($value, $this->options[0] ?? null) : "";
    }
    
}
```
2- Create a function in another pho file to call the filter

```php
MySanitizes.php

<?php

namespace YourNamespace; // <<<<<<<<<-- Your namespace here

use Filters\MyFilter;

class MySanitizes 
{
  
    /**
     * Filter strip_tags.
     * Strip HTML and PHP tags from a string.
     *
     * @param array|string $allowable_tags
     * @return MyFilter
     */
    public static function myFilter($allowable_tags = ""): MyFilter
    {
        return new MyFilter($allowable_tags);
    }
    
}
```

3- Use filter

```php
use YourNamespace\MySanitizes;

//sanitize
$value = MySanitizes::myFilter("<a>")->clean("<a href='#'>Link</a> <h1>Hello world!</h1>");
```
Output:

```json
<a href='#'>Link</a> Hello world!
```


<br>
<hr>
<br>

## Filters

<br>
<hr>
<br>

## striptags

Strip HTML and PHP tags from a string.

`striptags(string $allowable_tags = "")`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::striptags("<a>")->clean("<a href='#'>Link</a> <h1>Hello world!</h1>");
```
Output:
```php
<a href='#'>Link</a> Hello world!
```

<br>
<hr>
<br>

## cnpj

Format the cnpj format number.

`cnpj()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::cnpj()->clean("54465939000150");
```
Output:

```php
54.465.939/0001-50
```

<br>
<hr>
<br>

## cpf

Format the cpf format number.

`cpf()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::cpf()->clean("43740999055");
```
Output:

```php
437.409.990-55
```

<br>
<hr>
<br>

## numeric

Numbers.

`numeric()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::numeric()->clean("asdfg123456");
```
Output:

```php
123456
```

<br>
<hr>
<br>

## alphanumeric

Letters from a to z and numbers.

`alphanumeric(bool $spaces = false)`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::alphanumeric()->clean("!@#asdfg123456");

$value2 = Sanitize::alphanumeric(true)->clean("!@#asdfg 123 456");
```

Output:

```php
//value
asdfg123456

//value2
asdfg 123 456
```

<br>
<hr>
<br>

## alpha

Letters from a to z.

`alpha(bool $spaces = false)`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::alpha()->clean("123456asdfg*&(");

$value2 = Sanitize::alpha(true)->clean("123456asd dfg*&(");
```

Output:

```php
//value
asdfg

//value2
asd dfg
```

<br>
<hr>
<br>

## url

filter_var FILTER_SANITIZE_URL

`url()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::url()->clean("http://php.net/manual/en/function.htmlentities.phpçù");
```

Output:

```php
http://php.net/manual/en/function.htmlentities.php
```

<br>
<hr>
<br>

## email

filter_var FILTER_SANITIZE_EMAIL

`email()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::email()->clean("çótest@test.com");
```

Output:

```php
test@test.com
```

<br>
<hr>
<br>

## strtolower

Make a string lowercase.

`strtolower()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::strtolower()->clean("FERNANDO ZUEET");
```

Output:

```php
fernando zueet
```

<br>
<hr>
<br>

## strtoupper

Make a string uppercase.

`strtoupper()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::strtoupper()->clean("fernando zueet");
```

Output:

```php
FERNANDO ZUEET
```

<br>
<hr>
<br>

## ucwords

Uppercase the first character of each word in a string.

`ucwords(string $delimiters = " \t\r\n\f\v")`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::ucwords()->clean("fernando zueet");
```

Output:

```php
Fernando Zueet
```

<br>
<hr>
<br>

## ucfirst

Make a string's first character uppercase.

`ucfirst()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::ucfirst()->clean("fernando zueet");
```

Output:

```php
Fernando zueet
```

<br>
<hr>
<br>

## lcfirst

Make a string's first character lowercase.

`lcfirst()`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::lcfirst()->clean("Fernando zueet");
```

Output:

```php
fernando zueet
```

<br>
<hr>
<br>

## rtrim

Removes blanks (or other characters) from the beginning of the string.

`rtrim(string $charlist = " \t\n\r\0\x0B")`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::rtrim()->clean("fernando zueet    ");
```

Output:

```php
fernando zueet
```

<br>
<hr>
<br>

## ltrim

Removes blanks (or other characters) from the beginning of the string.

`ltrim(string $charlist = " \t\n\r\0\x0B")`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::ltrim()->clean("     fernando zueet");
```

Output:

```php
fernando zueet
```

<br>
<hr>
<br>

## trim

Removing space at the beginning and end of a string.

`trim(string $charlist = " \t\n\r\0\x0B")`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::trim()->clean("     fernando zueet    ");
```

Output:

```php
fernando zueet
```

<br>
<hr>
<br>

## date

Date format.

`date(string $format = 'Y-m-d')`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::date("Y-m-d")->clean("01/06/1987");
```

Output:

```php
1987-06-01
```

<br>
<hr>
<br>

## type

Format a types. 

`type(string $type)` 

$type: string bool int float array object

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::type('string')->clean(10);

$value2 = Sanitize::type('bool')->clean('true');

$value3 = Sanitize::type('int')->clean('1234');

$value4 = Sanitize::type('float')->clean('100,5');
```

Output:

```php
//value
'10' 

//value2
true

//value3
1234

//value4
100.5
```

<br>
<hr>
<br>

## numberFormat

Format a number with grouped thousands.

`numberFormat(int $decimals = 0, string $decimalpoint = '.', string $separator = ',')`

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::numberFormat(2, ',', '.')->clean("1000");
```

Output:

```php
1.000,00
```

<br>
<hr>
<br>


## pregReplace

Perform a regular expression search and replace.

`pregReplace($pattern, $replacement)`

http://php.net/manual/en/function.preg-replace.php

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::pregReplace('/[^A-Za-z]/', '')->clean("1234asdfg");
```

Output:

```php
asdfg
```

<br>
<hr>
<br>

## filterVar

Filters a variable with a specified filter.

`filterVar(int $filter = FILTER_DEFAULT, $options = null)`

http://php.net/manual/en/function.filter-var.php

```php
use FzPhpSanitize\Sanitize;

$value = Sanitize::filterVar(FILTER_SANITIZE_EMAIL)->clean("çótest@test.com");
```

```php
test@test.com
```

<br>
<hr>
<br>


## Contributing

Please see [CONTRIBUTING](https://github.com/FernandoZueet/php-sanitize/graphs/contributors) for details.

## Security

If you discover security related issues, please email fernandozueet@hotmail.com instead of using the issue tracker.

## Credits

- [Fernando Zueet](https://github.com/FernandoZueet)

## License

The FZ Php Sanitize is licensed under the MIT license. See [License File](LICENSE.md) for more information.
