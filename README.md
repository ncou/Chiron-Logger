# Chiron-logger

[![Build Status](https://travis-ci.org/ncou/Chiron-Logger.svg?branch=master)](https://travis-ci.org/ncou/Chiron-Logger)
[![Coverage Status](https://coveralls.io/repos/github/ncou/Chiron-Logger/badge.svg?branch=master)](https://coveralls.io/github/ncou/Chiron-Logger?branch=master)
[![CodeCov](https://codecov.io/gh/ncou/Chiron-Logger/branch/master/graph/badge.svg)](https://codecov.io/gh/ncou/Chiron-Logger)

[![Total Downloads](https://img.shields.io/packagist/dt/chiron/logger.svg?style=flat-square)](https://packagist.org/packages/chiron/logger/stats)
[![Monthly Downloads](https://img.shields.io/packagist/dm/chiron/logger.svg?style=flat-square)](https://packagist.org/packages/chiron/logger/stats)

[![StyleCI](https://styleci.io/repos/132444388/shield?style=flat)](https://styleci.io/repos/132444388)

Example :

```php
<?php
// you can define minimal login level (ex : ERROR) if you add a second parameter, by default all the levels are logged
$logger = new Chiron\Logger('./' . 'logger_'. date('Y-m-d') .'.log');
$logger->log('error',  'Example error text' );

//Multilines + replace value beetween "{}"
$logger->log('error',  'Line 1 : {TXT}', array('TXT' => null) ); // empty
$logger->log('error',  'Line 2 : {TXT}', array('TXT' => 'toto') ); // string
$logger->log('error',  'Line 3 : {TXT}', array('TXT' => 1234) ); // integer
$logger->log('error',  'Line 4 : {TXT}', array('TXT' => date(\DateTime::RFC3339) ) ); // object date

$logger->info('info text !');
$logger->notice('notice text !');

$logger->warning('Warning text : {TXT}', array('TXT' => 'Hector' ) );

```

Minimalist PSR3 Logger based on : https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpKernel/Log/Logger.php
