
Mojo's Laravel Helpers
========================

[![Build Status](https://travis-ci.org/mojopollo/laravel-helpers.svg?branch=master)](https://travis-ci.org/mojopollo/laravel-helpers)
[![Latest Stable Version](https://poser.pugx.org/mojopollo/laravel-helpers/v/stable)](https://packagist.org/packages/mojopollo/laravel-helpers)
[![Latest Unstable Version](https://poser.pugx.org/mojopollo/laravel-helpers/v/unstable)](https://packagist.org/packages/mojopollo/laravel-helpers)
[![License](https://poser.pugx.org/mojopollo/laravel-helpers/license)](https://packagist.org/packages/mojopollo/laravel-helpers)
[![Total Downloads](https://poser.pugx.org/mojopollo/laravel-helpers/downloads)](https://packagist.org/packages/mojopollo/laravel-helpers)


Mojo's Laravel Helpers: A suite of various complimentary helpers for the [Laravel framework](https://github.com/laravel/laravel) and PHP 5.4/5.5/5.6/7.0.
Some of these helpers are based on code found in Stackoverflow, look for the @see properties for references.

- [Installation](#installation)
- [Usage](#usage)
- [Helpers: String](#helper-string)
- [Helpers: Array](#helper-array)
- [Helpers: Date & Time](#helper-datetime)
- [Helpers: Files & Directories](#helper-file)
- [Changelog](CHANGELOG.md)

<a id="installation"></a>
## Installation

#### Step 1: Add package via composer

Add this package to your `composer.json` file with the following command

```bash
composer require mojopollo/laravel-helpers
```

#### Step 2: Update laravel 5.x `config/app.php` file

Add the following into the `providers` array:
```php
Mojopollo\Helpers\StringHelperServiceProvider::class,
Mojopollo\Helpers\ArrayHelperServiceProvider::class,
Mojopollo\Helpers\DateTimeHelperServiceProvider::class,
Mojopollo\Helpers\FileHelperServiceProvider::class,
```

Add the following into the `aliases` array:
```php
'StringHelper'   => Mojopollo\Helpers\Facades\StringHelper::class,
'ArrayHelper'    => Mojopollo\Helpers\Facades\ArrayHelper::class,
'DateTimeHelper' => Mojopollo\Helpers\Facades\DateTimeHelper::class,
'FileHelper'     => Mojopollo\Helpers\Facades\FileHelper::class,
```

<a id="usage"></a>
## Usage
To enable any of the helpers classes inside a controller, invoke the `use` keyword:

```php
<?php namespace App\Http\Controllers;

use ArrayHelper;
use FileHelper;
...
```

You can now call any of helper methods via their facades:

```php
StringHelper::replaceFirstMatch('one two three four five six', 3)

FileHelper::directoryFiles('/directory-path')

...
```

If you do not want to utilize the `use` keyword, you can alternatively use a blackslash`\` when calling the helpers:

```php
\StringHelper::replaceFirstMatch('one two three four five six', 3)

\FileHelper::directoryFiles('/directory-path')

...
```

<a id="helper-string"></a>
## StringHelper

#### camelCase
Convert a value to camel case

```php
string camelCase(string $value)
```
```php
StringHelper::camelCase('mojo_pollo');

// mojoPollo
```

#### snakeCase
Convert a value to snake case

```php
string snakeCase(string $value [, string $delimiter = '_'])
```
```php
StringHelper::snakeCase('mojoPollo');

// mojo_pollo
```

#### replaceFirstMatch
str_replace() for replacing just the first match in a string search

```php
string replaceFirstMatch(string $search, string $replace, string $subject)
```
```php
StringHelper::replaceFirstMatch('mojo', 'jojo', 'mojo is a pollo and mojo');

// jojo is a pollo and mojo
```

#### limitByWords
Returns a string limited by the word count specified

```php
string limitByWords(string $str [, int $wordCount = 10])
```
```php
StringHelper::limitByWords('one two three four five six', 3);

// one two three
```

<a id="helper-array"></a>
## ArrayHelper

#### randomElement
Get a random element from the array supplied

```php
mixed randomElement(array $array)
```
```php
ArrayHelper::randomElement(['one', 'two', 'three']);

// two
```

#### morphArrayKeys
Will camelize all keys found in a array or multi dimensional array

```php
array morphArrayKeys(array $originalArray [, $morphTo = 'camel'])
```
```php
ArrayHelper::morphArrayKeys([
  'user' => [
    'first_name' => 'mojo',
    'attributes' => [
      'second_key' => 'second value',
    ],
  ],
], 'camel');

// [
//   'user' => [
//     'firstName' => 'mojo',
//     'attributes' => [
//       'secondKey' => 'second value',
//     ],
//   ],
// ]
```

#### castValues
Will cast '123' as int, 'true' as the boolean true, etc

```php
array castValues(array $originalArray)
```
```php
ArrayHelper::castValues([
  'value1' => 'true',
  'value2' => 'false',
  'value3' => '123',
  'value4' => '{"mojo": "pollo"}',
]);

// [
//   'value1' => true,
//   'value2' => false,
//   'value3' => 123,
//   'value4' => ['mojo' => 'pollo'],
// ]
```

#### sortByPriority
Re-orders an array by moving elements to the top of the array based on a pre-defined array stating which elements to move to top of array

```php
array sortByPriority(array $originalArray, array $priority)
```
```php

$originalArray = [
  [
    'name' => 'White Castle',
    'city' => 'Las Vegas',
    'zip' => '89109',
  ],
  [
    'name' => 'Burger Town',
    'city' => 'Sherman Oaks',
    'zip' => '91403',
  ],
  [
    'name' => 'Krabby Patty',
    'city' => 'Walking the Plankton',
    'zip' => '00000',
  ],
  [
    'name' => 'Uber Burger',
    'city' => 'Little Rock',
    'zip' => '72201',
  ],
];

$priority = [
  [
    'city' => 'Walking the Plankton'
  ],
  [
    'name' => 'Burger Town'
  ],
];


ArrayHelper::sortByPriority($originalArray, $priority);

// [
//   [
//     'name' => 'Krabby Patty',
//     'city' => 'Walking the Plankton',
//     'zip' => '00000',
//   ],
//   [
//     'name' => 'Burger Town',
//     'city' => 'Sherman Oaks',
//     'zip' => '91403',
//   ],
//   [
//     'name' => 'White Castle',
//     'city' => 'Las Vegas',
//     'zip' => '89109',
//   ],
//   [
//     'name' => 'Uber Burger',
//     'city' => 'Little Rock',
//     'zip' => '72201',
//   ],
// ]
```

<a id="helper-datetime"></a>
## DateTimeHelper


<a id="helper-file"></a>
## FileHelper

#### directoryFiles
Return an array of files with their full paths contained in a directory and its subdirectories

```php
array directoryFiles(string $path)
```
```php
FileHelper::directoryFiles('/directory-path');

// ['/directory-path/file1.txt', '/directory-path/file2.txt', '/directory-path/subdirectory/file3.txt']
```
