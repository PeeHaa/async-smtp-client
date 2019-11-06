<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient;

final class Credentials
{
    private string $username;

    private ?string $password;

    public function __construct(string $username, ?string $password = null)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}
