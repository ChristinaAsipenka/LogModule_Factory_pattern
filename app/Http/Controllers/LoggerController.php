<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\LoggerService;

class LoggerController extends Controller
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function log()
    {
        $loggerType = \config('custom.log_default');
        $this->loggerService->setType($loggerType);
        $this->loggerService->send('Send message by default logger');
    }

    /**
     *    Sends a log message to a special logger.
     *
     * @param string $type
     */
    public function logTo(string $type)
    {
        $this->loggerService->sendByLogger('Message sent by specific logger', $type);
    }

    /**
     *    Sends a log message to all loggers.
     */
    public function logToAll()
    {
        $loggers = \config('custom.loggers');

        foreach ($loggers as $logger) {
            $this->loggerService->setType($logger);
            $loggerType = $this->loggerService->getType();
            $this->loggerService->send('Send message by ' . $loggerType . 'logger');
        }
    }
}
