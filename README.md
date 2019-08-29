# Czech taxpayer identification number (IČO) Validator

> Czech: Validátor identifikačního čísla osoby IČO

[![Build Status](https://travis-ci.com/czechphp/ico-validator.svg?branch=master)](https://travis-ci.com/czechphp/ico-validator)
[![codecov](https://codecov.io/gh/czechphp/ico-validator/branch/master/graph/badge.svg)](https://codecov.io/gh/czechphp/ico-validator)

## Installation

Install the latest version with

```
$ composer require czechphp/ico-validator
```

## Basic usage

```php
<?php

use Czechphp\ICOValidator\ICOValidator;

$validator = new ICOValidator();
$violation = $validator->validate('401224/001');

if ($violation === ICOValidator::ERROR_NONE) {
    // valid
}

```
