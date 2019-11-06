<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient;

final class Configuration
{
    private SmtpServer $smtpServer;

    public function __construct(SmtpServer $smtpServer)
    {
        $this->smtpServer = $smtpServer;
    }
}
