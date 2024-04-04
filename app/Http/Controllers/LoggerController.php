<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\LoggerService;
use Mockery\Exception;

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

        try{
            $this->loggerService->setType($loggerType);
        }catch (Exception $e){
            echo $e->getMessage();
        }

        $this->loggerService->send('Send message by default logger');
    }

    /**
     *    Sends a log message to a special logger.
     *
     * @param string $type
     */
    public function logTo(string $type)
    {
        try{
            $this->loggerService->sendByLogger('Message sent by specific logger', $type);
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

    /**
     *    Sends a log message to all loggers.
     */
    public function logToAll()
    {
        $loggers = \config('custom.loggers');

        foreach ($loggers as $logger) {
            
            try{
                $this->loggerService->setType($logger);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            $loggerType = $this->loggerService->getType();
            $this->loggerService->send('Send message by ' . $loggerType . 'logger');
        }
    }
}
