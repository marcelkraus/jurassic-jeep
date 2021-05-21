<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ContactRequest
{
    /**
     * @Assert\NotBlank
     */
    protected $firstName = "";

    /**
     * @Assert\NotBlank
     */
    protected $lastName = "";

    /**
     * @Assert\NotBlank
     * @Assert\Email
     */
    protected $emailAddress = "";

    protected $phone = "";

    /**
     * @Assert\NotBlank
     */
    protected $message = "";

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setEmailAddress(string $emailAddress): void {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress(): string {
        return $this->emailAddress;
    }

    public function setPhone($phone): void {
        $this->phone = $phone == null ? "" : $phone;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }
}
