<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient;

final class EmailAddresses implements \Iterator, \Countable
{
    /** @var array<EmailAddress> */
    private array $emailAddresses = [];

    public function add(EmailAddress $emailAddress): void
    {
        $this->emailAddresses[] = $emailAddress;
    }

    public function current(): EmailAddress
    {
        return current($this->emailAddresses);
    }

    public function next(): void
    {
        next($this->emailAddresses);
    }

    public function key(): ?int
    {
        return key($this->emailAddresses);
    }

    public function valid(): bool
    {
        return $this->key() !== null;
    }

    public function rewind(): void
    {
        reset($this->emailAddresses);
    }

    public function count(): int
    {
        return count($this->emailAddresses);
    }
}
