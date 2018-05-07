# nano-logger

Example :

```php
<?php
// you can define minimal login level (ex : ERROR) if you add a second parameter, by default all the levels are logged
$logger = new NanoLogger('./' . 'logger_'. date('Y-m-d') .'.log');
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

TODO : 
- move the "log()" function as private + rename it to "_write()" + remove the check on the level exist in array.
- allow in the constructor to define a callable function to use as formater, instead of the default formater defined in the class.

Example for callable : https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpKernel/Log/Logger.php#L40
