<?php

declare(strict_types=1);

namespace Chiron\Logger\Traits;

use Psr\Log\LogLevel;
use Chiron\Logger\Facade\Log;

/**
 * A trait providing an object short-cut method to logging.
 */
trait LogTrait
{
    /**
     * Convenience method to write a message to Log.
     *
     * @param string $message Log message.
     * @param mixed $level Error level.
     * @param string|array $context Additional log data relevant to this message.
     */
    public function log(string $message, $level = LogLevel::ERROR, $context = []): void
    {
        // TODO : créer une méthode privée 'logger(?string $channel = null)' qui retournera l'instance du logger associé au nom de la classe courante (static::class) ou le logger par défault si has(static::class) retourne false. et si on a passé un channel on essaye de le récupérer !!!
        Log::log($level, $message, (array) $context); // TODO : il faudrait surement regarder si il existe un channel propre à la classe (cad sur le static::class) sinon utiliser le channel 'default'
    }
}
