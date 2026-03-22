<?php

namespace EdenProject\MyWay\Model;

class User
{
    protected int $id;
    protected string $name;
    protected string $login_name;
    protected ?string $nick_name = null;
    protected string $email;
    protected ?string $phone_number = null;
    protected string $password;
    protected string $password_confirmation;
    protected ?string $remember_token = null;
    protected bool $enabled = true;
    protected string $created_at;
    protected string $updated_at;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLoginName(): string
    {
        return $this->login_name;
    }

    public function setLoginName(string $login_name): void
    {
        $this->login_name = $login_name;
    }

    public function getNickName(): ?string
    {
        return $this->nick_name;
    }

    public function setNickName(?string $nick_name): void
    {
        $this->nick_name = $nick_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPasswordConfirmation(): string
    {
        return $this->password_confirmation;
    }

    public function setPasswordConfirmation(string $password_confirmation): void
    {
        $this->password_confirmation = $password_confirmation;
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken(?string $remember_token): void
    {
        $this->remember_token = $remember_token;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}
