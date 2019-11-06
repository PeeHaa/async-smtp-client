<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClientTest\Unit;

use PeeHaa\AsyncSmtpClient\Credentials;
use PHPUnit\Framework\TestCase;

final class CredentialsTest extends TestCase
{
    private Credentials $credentials;

    protected function setUp(): void
    {
        $this->credentials = new Credentials('info@example.com', 'MyAwesomePassword');
    }

    public function testGetUsername(): void
    {
        $this->assertSame('info@example.com', $this->credentials->getUsername());
    }

    public function testGetPasswordWhenSet(): void
    {
        $this->assertSame('MyAwesomePassword', $this->credentials->getPassword());
    }

    public function testGetPasswordWhenNotSet(): void
    {
        $this->assertNull((new Credentials('info@example.com'))->getPassword());
    }
}
