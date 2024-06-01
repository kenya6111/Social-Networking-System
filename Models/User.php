<?php

namespace Models;

use Models\Interfaces\Model;
use Models\Traits\GenericModel;

class User implements Model {
    use GenericModel;
    //
    public function __construct(
        private string $username,
        private string $email,
        private ?int $id = null,
        private ?string $company = null,
        private ?string $email_verified_at = null,
        private ?DataTimeStamp $timeStamp = null,
    ) {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getCompany(): ?string {
        return $this->company;
    }

    public function setCompany(?string $company): void {
        $this->company = $company;
    }

    public function getTimeStamp(): ?DataTimeStamp
    {
        return $this->timeStamp;
    }

    public function setTimeStamp(DataTimeStamp $timeStamp): void
    {
        $this->timeStamp = $timeStamp;
    }
    public function getEmail_verified_at(): ?string {
        return $this->email_verified_at;
    }

    public function setEmail_verified_at(string $email_verified_at): void {
        $this->email_verified_at = $email_verified_at;
    }
}