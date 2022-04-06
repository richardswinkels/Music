<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class MusicFormatter
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                '%context.username%: %message% | %context.action% | %datetime%' . PHP_EOL
            ));
        }
    }
}