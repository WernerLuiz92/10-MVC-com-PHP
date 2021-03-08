<?php

namespace Werner\MVC\Model\Entity;

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $name;

    /**
     * @Column(type="string")
     */
    private string $email;

    /**
     * @Column(type="string")
     */
    private string $password;

    public function passwordMatch(string $purePassword): bool
    {
        return password_verify($purePassword, $this->password);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
