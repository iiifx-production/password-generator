# Password Generator
Простая библиотека для генерации паролей c возможностью использования криптографически безопасных алгоритмов

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

Сложные, безопасные пароли: от 10 до 16 знаков, цифры, буквы и спец. знаки
``` php
use iiifx\PasswordGenerator\Method\MethodOpenSSL;

$length = new Length( 10, 16 ); # 10-16 знаков
$symbols = [
    new Symbols( 'abcdefghijklmnopqrstuvwxyz', 100 ), # Приоритет 100
    new Symbols( 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 50 ), # Приоритет 50
    new Symbols( '1234567890', 50 ), # Приоритет 50
    new Symbols( '!@#$%?&:*+-.', 30 ), # Приоритет 30
];
$options = new Options( $length, $symbols );
$method = new MethodOpenSSL();
$generator = new Generator( $options, $method );

echo $generator->generate(); # Xn64h1:wgDk@@eh
echo $generator->generate(); # lqF&X4ywaAo
echo $generator->generate(); # E8Yk60*qavzVr
```

Использование криптографически безопасных методов генерации
``` php
use iiifx\PasswordGenerator\Method\MethodMT;
use iiifx\PasswordGenerator\Method\MethodOpenSSL;
use iiifx\PasswordGenerator\Method\MethodRandomInt;

# По умолчанию используется базовый небезопасный алгоритм - MT
$generator = new Generator( $options ); 
# Этот пример аналогичен предыдущему
$generator = new Generator( $options, new MethodMT() ); 

# Для PHP7 возможно использовать безопасный метод random_int()
$generator = new Generator( $options, new MethodRandomInt() );

# При наличии расширения возможно использовать безопасный метод OpenSSL
$generator = new Generator( $options, new MethodOpenSSL() );

# Любой из методов можно проверить на доступность
MethodMT::isAvailable(); # true, доступен всегда
MethodRandomInt::isAvailable(); # false, метод недоступен для PHP5
MethodOpenSSL::isAvailable(); # true, расширение OpenSSL подключено
```

## Другие примеры

Имитация хэшей
``` php
$generator = new Generator( new Options(
    new Length( 32 ),
    [ new Symbols( '0123456789abcdef' ) ]
) );
echo $generator->generate(); # 3a971aefab2b86468d1de895110b0e39
```

## Тесты

[![Build Status][ico-travis]][link-travis] [![Code Coverage][ico-codecoverage]][link-scrutinizer]

## Лицензия

[![Software License][ico-license]](LICENSE.md)

## Запланировано
* Использовать криптографически безопасные генераторы случаных чисел
    - ~~Для PHP7 использовать random_int()~~
    - ~~Для PHP5 использовать openssl_random_pseudo_bytes()~~
    - Использовать сторонние решения
* Реализовать формирование пароля по шаблону
* Реализовать быстрое создание через Generator::create( ... )


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
