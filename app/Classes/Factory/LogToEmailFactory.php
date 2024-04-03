<?php

declare(strict_types=1);

namespace App\Classes\Factory;

use App\Interfaces\LoggerTypeInterface;

class LogToEmailFactory implements LoggerTypeInterface
{
    protected string $loggerType = 'Email';

    public function getLoggerType(): string
    {
        return $this->loggerType;
    }

    public function sendMessage(string $message): void
    {
        $mail = \config('custom.log_email');
        mail($mail, 'log message', $message);

        echo $message." Log via Email $mail</br>";
    }
}
