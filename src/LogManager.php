<?php

declare(strict_types=1);

namespace Chiron\Logger;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Chiron\Container\SingletonInterface;
use Psr\Log\NullLogger;
use Psr\Log\AbstractLogger;

//https://github.com/laravel/framework/blob/6121a522c1830542f0b1783847894e48d7187c54/src/Illuminate/Log/LogManager.php

//https://github.com/cakephp/cakephp/blob/master/src/Log/Log.php

// TODO : créer une Facade associé avec cette classe LoggerManager

// TODO : créer une classe LoggerTrait ou LogTrait (https://github.com/cakephp/cakephp/blob/master/src/Log/LogTrait.php) qui permettra de récupérer soit le logger associé à la classe, soit le logger par défaut un truc du genre :
// $logger = LoggerManagerFacade::hasChannel(static::class) ? LoggerManagerFacade::getChannel(static::class) : LoggerManagerFacade::getChannel('default')
// $logger->write($message, $level, $context)


// TODO : créer une facade pour le LoggerManager ?????
// TODO : renommer toutes les méthodes en enlevant la partie "logger", cad avoir uniqumenet des méthode (add() / get() / has())
// TODO : déplacer dans le package chiron/logger ????
// TODO : renommer cette classe en LoggerBag::class ????
// TODO : classe à renommer en LogManager !!!!!
// TODO : faire étendre cette classe de l'interface LoggerInterface !!!!
// TODO : utiliser une constante de classe pour la valeur 'default' !!!!

// TODO : ajouter la méthode magique __call() pour appeller sur le channel par défaut les différentes méthodes pouvant exister dans la classe du logger par défault

final class LogManager extends AbstractLogger implements SingletonInterface
{
    /** @var array */
    private $channels = [];

    public function __construct()
    {
        // Init the default channel to have a mandatory 'default' channel.
        $this->setDefaultLogger(new NullLogger());
    }

    /**
     * Set default logger.
     *
     * @param string $channel Logger channel
     * @param LoggerInterface $logger Logger object
     */
    public function setDefaultLogger(LoggerInterface $logger): void
    {
        $this->channels['default'] = $logger;
    }

    /**
     * Set logger object for the given channel.
     *
     * @param string $channel Logger channel
     * @param LoggerInterface $logger Logger object
     */
    public function set(string $channel, LoggerInterface $logger): void
    {
        $this->channels[$channel] = $logger;
    }

    /**
     * Get the default log channel instance.
     *
     * @param string|null $channel
     *
     * @return \Psr\Log\LoggerInterface
     */
    public function getDefaultLogger(): LoggerInterface
    {
        return $this->channel('default');
    }

    /**
     * Attempt to get a log channel instance.
     *
     * @param string|null $channel
     *
     * @return \Psr\Log\LoggerInterface
     * @throws \InvalidArgumentException
     */
    public function channel(string $channel): LoggerInterface
    {
        if (! $this->has($channel)) {
            // TODO : créer un loggernotfoundexception ????
            throw new InvalidArgumentException(sprintf('Logger channel "%s" not found.', $channel)); // TODO : lever une autre exception si le $channel est vide ('').
        }

        return $this->channels[$channel];
    }

    /**
     * Checks if the given channel exists.
     *
     * @param string $channel Logger channel
     *
     * @return bool
     */
    public function has(string $channel): bool
    {
        return isset($this->channels[$channel]);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = []): void
    {
        $this->getDefaultLogger()->log($level, $message, $context);
    }
}
