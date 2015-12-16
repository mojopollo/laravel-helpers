
Mojo's Laravel Helpers
========================

[![Build Status](https://travis-ci.org/mojopollo/laravel-helpers.svg?branch=master)](https://travis-ci.org/mojopollo/laravel-helpers)
[![Latest Stable Version](https://poser.pugx.org/mojopollo/laravel-helpers/v/stable)](https://packagist.org/packages/mojopollo/laravel-helpers)
[![Latest Unstable Version](https://poser.pugx.org/mojopollo/laravel-helpers/v/unstable)](https://packagist.org/packages/mojopollo/laravel-helpers)
[![License](https://poser.pugx.org/mojopollo/laravel-helpers/license)](https://packagist.org/packages/mojopollo/laravel-helpers)
[![Total Downloads](https://poser.pugx.org/mojopollo/laravel-helpers/downloads)](https://packagist.org/packages/mojopollo/laravel-helpers)

- [About](#about)
- [Installation](#installation)
- [Usage](#usage)
- [Helpers: String](#helper-string)
- [Helpers: Array](#helper-array)
- [Helpers: Date & Time](#helper-datetime)
- [Helpers: Files & Directories](#helper-file)

<a id="about"></a>
## About
Mojo's Laravel Helpers: A suite of various helpers for the [Laravel framework](https://github.com/laravel/laravel).
Some of these helpers are based on code found in Stackoverflow, look for the @see properties for references.

<a id="installation"></a>
## Installation

#### Step 1: Composer

Add this package to your `composer.json` file

`composer require mojopollo/laravel-helpers`

Next, run the `composer update` command.

#### Step 2: Update laravel 5 `providers` and `aliases` arrays
 * Each class has its own unique `providers` and `aliases` entries that need to be added to your `config/app.php` file.
 * These are noted under their prespective classes below.

<a id="usage"></a>
## Usage
You can now call any of helper methods via their facades:

`MojoString::replaceFirstMatch('one two three four five six', 3)`

`MojoFile::directoryFiles('/directory-path')`

`...`

<a id="helper-string"></a>
## String
 * Add `Mojopollo\Helpers\StringServiceProvider::class` to your `config/app.php` within the `providers` array.
 * Add `'MojoString' => Mojopollo\Helpers\Facades\String::class` to your `config/app.php` configuration file within the `aliases` array.

#### camelCase

```php
string camelCase(string $value)
```
```php
MojoString::camelCase('mojo_pollo');

// mojoPollo
```

#### snakeCase

```php
string snakeCase(string $value [, string $delimiter = '_'])
```
```php
MojoString::snakeCase('mojoPollo');

// mojo_pollo
```

#### replaceFirstMatch

```php
string replaceFirstMatch(string $search, string $replace, string $subject)
```
```php
MojoString::replaceFirstMatch('mojo', 'jojo', 'mojo is a pollo and mojo');

// jojo is a pollo and mojo
```

#### testLimitByWords

```php
string testLimitByWords(string $str [, int $wordCount = 10])
```
```php
MojoString::testLimitByWords('one two three four five six', 3);

// one two three
```

<a id="helper-array"></a>
## Array
 * Add `Mojopollo\Helpers\ArrServiceProvider::class` to your `config/app.php` within the `providers` array.
 * Add `'MojoArray' => Mojopollo\Helpers\Facades\Arr::class` to your `config/app.php` configuration file within the `aliases` array.

#### randomElement

```php
mixed randomElement(array $array)
```
```php
MojoArray::randomElement(['one', 'two', 'three']);

// two
```

#### morphArrayKeys

```php
array morphArrayKeys(array $originalArray [, $morphTo = 'camel'])
```
```php
MojoArray::morphArrayKeys([
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

```php
array castValues(array $originalArray)
```
```php
MojoArray::castValues([
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


MojoArray::sortByPriority($originalArray, $priority);

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
## Date & Time
 * Add `Mojopollo\Helpers\DateTimeServiceProvider::class` to your `config/app.php` within the `providers` array.
 * Add `'MojoDateTime' => Mojopollo\Helpers\Facades\DateTime::class` to your `config/app.php` configuration file within the `aliases` array.


<a id="helper-file"></a>
## Files & Directories
 * Add `Mojopollo\Helpers\FileServiceProvider::class` to your `config/app.php` within the `providers` array.
 * Add `'MojoFile' => Mojopollo\Helpers\Facades\File::class` to your `config/app.php` configuration file within the `aliases` array.

#### directoryFiles

```php
array directoryFiles(string $path)
```
```php
MojoFile::directoryFiles('/directory-path');

// ['/directory-path/file1.txt', '/directory-path/file2.txt', '/directory-path/subdirectory/file3.txt']
```
