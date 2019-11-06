<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClientTest\Unit\Exception;

use PeeHaa\AsyncSmtpClient\Exception\InvalidEmailAddress;
use PHPUnit\Framework\TestCase;

final class InvalidEmailAddressTest extends TestCase
{
    public function testConstructorFormatsMessageCorrectly(): void
    {
        $this->expectException(InvalidEmailAddress::class);
        $this->expectExceptionMessage('"foo" is not a valid email address');

        throw new InvalidEmailAddress('foo');
    }
}
