<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient;

use PeeHaa\AsyncSmtpClient\Exception\InvalidEmailAddress;

final class EmailAddress
{
    private string $localPart;

    private string $domain;

    private ?string $name;

    public function __construct(string $address, ?string $name = null)
    {
        if (!preg_match('~(?P<localPart>.+)@(?P<domain>.+(?:\..+)?)~', $address, $matches)) {
            throw new InvalidEmailAddress($address);
        }

        $this->localPart = $matches['localPart'];
        $this->domain    = $matches['domain'];
        $this->name      = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return sprintf('%s@%s', $this->localPart, $this->domain);
    }

    public function getLocalPart(): string
    {
        return $this->localPart;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getFullAddress(): string
    {
        if ($this->name === null) {
            return sprintf('<%s>', $this->getAddress());
        }

        return sprintf('%s <%s>', $this->name, $this->getAddress());
    }
}
