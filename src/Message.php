<?php declare(strict_types=1);

namespace PeeHaa\AsyncSmtpClient;

final class Message
{
    private EmailAddress $fromAddress;

    private EmailAddresses $toAddresses;

    private EmailAddresses $ccAddresses;

    private EmailAddresses $bccAddresses;

    private ?string $subject = null;

    private ?string $htmlBody = null;

    private ?string $textBody = null;

    private array $attachments;

    public function __construct(EmailAddress $fromAddress)
    {
        $this->fromAddress  = $fromAddress;
        $this->toAddresses  = new EmailAddresses();
        $this->ccAddresses  = new EmailAddresses();
        $this->bccAddresses = new EmailAddresses();
    }

    public function addToAddress(EmailAddress $emailAddress): self
    {
        $this->toAddresses->add($emailAddress);

        return $this;
    }

    public function addCcAddress(EmailAddress $emailAddress): self
    {
        $this->ccAddresses->add($emailAddress);

        return $this;
    }

    public function addBccAddress(EmailAddress $emailAddress): self
    {
        $this->bccAddresses->add($emailAddress);

        return $this;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function setHtmlBody(string $body): self
    {
        $this->htmlBody = $body;

        return $this;
    }

    public function setTextBody(string $body): self
    {
        $this->textBody = $body;

        return $this;
    }
}
