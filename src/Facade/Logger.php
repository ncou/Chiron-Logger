<?php

declare(strict_types=1);

namespace Chiron\Logger\Facade;

use Chiron\Core\Facade\AbstractFacade;

final class Logger extends AbstractFacade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): string
    {
        // phpcs:ignore SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly.ReferenceViaFullyQualifiedName
        return \Psr\Log\LoggerInterface::class;
    }
}
