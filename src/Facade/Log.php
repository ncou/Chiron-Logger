<?php

declare(strict_types=1);

namespace Chiron\Logger\Facade;

use Chiron\Core\Facade\AbstractFacade;

final class Log extends AbstractFacade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): string
    {
        // phpcs:ignore SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly.ReferenceViaFullyQualifiedName
        return \Chiron\Logger\LogManager::class;
    }
}
