<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClientTest\Unit;

use PeeHaa\AsyncSmtpClient\EmailAddress;
use PeeHaa\AsyncSmtpClient\EmailAddresses;
use PHPUnit\Framework\TestCase;

final class EmailAddressesTest extends TestCase
{
    private EmailAddresses $emailAddresses;

    protected function setUp(): void
    {
        $this->emailAddresses = new EmailAddresses();

        $this->emailAddresses->add(new EmailAddress('test1@example.com'));
        $this->emailAddresses->add(new EmailAddress('test2@example.com'));
    }

    public function testIterator(): void
    {
        $expectedData = [
            'test1@example.com',
            'test2@example.com',
        ];

        foreach ($this->emailAddresses as $index => $emailAddress) {
            $this->assertSame($expectedData[$index], $emailAddress->getAddress());
        }
    }

    public function testCountable(): void
    {
        $this->assertSame(2, count($this->emailAddresses));
    }
}
