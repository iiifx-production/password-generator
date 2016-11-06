# Password Generator
Простая библиотека для генерации паролей

[![Latest Version on Packagist][ico-version]][link-packagist] [![Build Status][ico-travis]][link-travis] [![Code Quality][ico-scrutinizer]][link-scrutinizer] [![Code Coverage][ico-codecoverage]][link-scrutinizer] [![Software License][ico-license]](LICENSE.md) [![Total Downloads][ico-downloads]][link-downloads]

## Установка

Используя Composer:

``` bash
$ composer require "iiifx-production/password-generator:0.*"
```

## Использование

Создание простых, коротких паролей: 5 знаков, только цифры
``` php
use iiifx\PasswordGenerator\Length;
use iiifx\PasswordGenerator\Options;
use iiifx\PasswordGenerator\Symbols;
use iiifx\PasswordGenerator\Generator;

$length = new Length( 5 );
$symbols = [
    new Symbols( '1234567890' ),
];
$options = new Options( $length, $symbols );
$generator = new Generator( $options );

echo $generator->generate(); # 47884
echo $generator->generate(); # 62802
echo $generator->generate(); # 35187
```

Более сложные пароли: 8 знаков, цифры и буквы в нижнем регистре
``` php
$length = new Length( 8 );
$symbols = [
    new Symbols( 'abcdefghijklmnopqrstuvwxyz', 100 ), # Приоритет 100
    new Symbols( '1234567890', 50 ), # Приоритет 50
];
$options = new Options( $length, $symbols );
$generator = new Generator( $options );

echo $generator->generate(); # a844aotw
echo $generator->generate(); # hmxqbug4
echo $generator->generate(); # v94v1c43
```

Очень сложные пароли: от 12 до 16 знаков, цифры, буквы и спец.знаки
``` php
$length = new Length( 12, 16 ); # 12-16 знаков
$symbols = [
    new Symbols( 'abcdefghijklmnopqrstuvwxyz', 100 ), # Приоритет 100
    new Symbols( 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 80 ), # Приоритет 80
    new Symbols( '1234567890', 80 ), # Приоритет 80
    new Symbols( '`~!@#$%^&\'";*(){}<>[]_+-|/\\?.,:', 10 ), # Приоритет 10
];
$options = new Options( $length, $symbols );
$generator = new Generator( $options );

echo $generator->generate(); # 3J#Ie&]qBm8Uah
echo $generator->generate(); # rUchvr<a8QGo
echo $generator->generate(); # c8s9E2sSmYB&X
```

## Тесты

[![Build Status][ico-travis]][link-travis] [![Code Coverage][ico-codecoverage]][link-scrutinizer]

## Лицензия

[![Software License][ico-license]](LICENSE.md)


[ico-version]: https://img.shields.io/packagist/v/iiifx-production/password-generator.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-downloads]: https://img.shields.io/packagist/dt/iiifx-production/password-generator.svg
[ico-travis]: https://travis-ci.org/iiifx-production/password-generator.svg
[ico-scrutinizer]: https://scrutinizer-ci.com/g/iiifx-production/password-generator/badges/quality-score.png?b=master
[ico-codecoverage]: https://scrutinizer-ci.com/g/iiifx-production/password-generator/badges/coverage.png?b=master

[link-packagist]: https://packagist.org/packages/iiifx-production/password-generator
[link-downloads]: https://packagist.org/packages/iiifx-production/password-generator
[link-travis]: https://travis-ci.org/iiifx-production/password-generator
[link-scrutinizer]: https://scrutinizer-ci.com/g/iiifx-production/password-generator/?branch=master