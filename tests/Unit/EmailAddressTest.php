<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClientTest\Unit;

use PeeHaa\AsyncSmtpClient\EmailAddress;
use PeeHaa\AsyncSmtpClient\Exception\InvalidEmailAddress;
use PHPUnit\Framework\TestCase;

final class EmailAddressTest extends TestCase
{
    private EmailAddress $emailAddressWithName;

    private EmailAddress $emailAddressWithoutName;

    protected function setUp(): void
    {
        $this->emailAddressWithName    = new EmailAddress('info@example.com', 'Test User');
        $this->emailAddressWithoutName = new EmailAddress('info@example.com');
    }

    public function testConstructorThrowsOnInvalidEmailAddress(): void
    {
        $this->expectException(InvalidEmailAddress::class);
        $this->expectExceptionMessage('"foo" is not a valid email address');

        new EmailAddress('foo');
    }

    public function testGetAddress(): void
    {
        $this->assertSame('info@example.com', $this->emailAddressWithName->getAddress());
    }

    public function testGetLocalPart(): void
    {
        $this->assertSame('info', $this->emailAddressWithName->getLocalPart());
    }

    public function testGetDomain(): void
    {
        $this->assertSame('example.com', $this->emailAddressWithName->getDomain());
    }

    public function testGetNameWhenSet(): void
    {
        $this->assertSame('Test User', $this->emailAddressWithName->getName());
    }

    public function testGetNameWhenNotSet(): void
    {
        $this->assertNull($this->emailAddressWithoutName->getName());
    }

    public function testGetFullAddressWhenNameIsSet(): void
    {
        $this->assertSame('Test User <info@example.com>', $this->emailAddressWithName->getFullAddress());
    }

    public function testGetFullAddressWhenNameIsNotSet(): void
    {
        $this->assertSame('<info@example.com>', $this->emailAddressWithoutName->getFullAddress());
    }
}
