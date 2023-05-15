<?php

namespace App\Logging;

use Illuminate\Log\Logger;
use Monolog\Processor\PsrLogMessageProcessor;

class CustomizeProcessor
{
    /**
     * Customize the given logger instance.
     */
    public function __invoke(Logger $logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->pushProcessor(new PsrLogMessageProcessor);
        }
    }
}
