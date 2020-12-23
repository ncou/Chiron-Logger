<?php

declare(strict_types=1);

namespace Chiron\Logger;

use Chiron\Logger\Facade\Logger;
use Psr\Log\LoggerAwareInterface;

final class LoggerAwareMutation
{
    public static function mutation(LoggerAwareInterface $class)
    {
        $class->setLogger(Logger::getInstance());
    }
}
