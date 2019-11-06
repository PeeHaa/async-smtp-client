<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient;

final class SmtpServer
{
    private string $address;

    private int $port;

    private bool $requiresTls = false;

    private ?Credentials $credentials = null;

    public function __construct(string $address, int $port = 25)
    {
        $this->address = $address;
        $this->port    = $port;
    }

    public function requireTls(): self
    {
        $this->requiresTls = true;

        return $this;
    }

    public function requireAuthentication(Credentials $credentials): self
    {
        $this->credentials = $credentials;

        return $this;
    }
}
