<?php

declare(strict_types=1);

namespace Chiron\Logger;

use Chiron\Logger\Facade\Log;
use Psr\Log\LoggerAwareInterface;

final class LoggerAwareMutation
{
    public static function mutation(LoggerAwareInterface $class)
    {
        $class->setLogger(Log::channel('default')); // TODO : il faudrait surement regarder si il existe un channel propre à la classe (cad sur le get_class($class)) sinon utiliser le channel 'default'
    }
}
