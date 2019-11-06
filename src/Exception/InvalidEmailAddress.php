<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient\Exception;

final class InvalidEmailAddress extends Exception
{
    public function __construct(string $emailAddress)
    {
        parent::__construct(
            sprintf('"%s" is not a valid email address', $emailAddress),
        );
    }
}
