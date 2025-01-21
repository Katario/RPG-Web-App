<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    #[ORM\Column(length: 255, unique: true)]
    private string $username;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\OneToMany(targetEntity: Game::class, mappedBy: 'gameMaster')]
    private Collection|array $gameMastering;

    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'user')]
    private Collection|array $characters;

    public function __construct()
    {
        $this->gameMastering = new ArrayCollection();
        $this->characters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    // TODO: Is needed?
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    // This is a representation of the user
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    // For temporary and sensitive data about the user
    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }



    public function getGame(): ArrayCollection
    {
        return $this->gameMastering;
    }

    public function setGameMastering(ArrayCollection $gameMastering): User
    {
        $this->gameMastering = $gameMastering;
        return $this;
    }

    public function addGame(Game $game): User
    {
        if (!$this->getGame($game)) {
            $this->gameMastering->add($game);
        }
        return $this;
    }

    public function removeGame(Game $game): User
    {
        if ($this->getGame()->contains($game)) {
            $this->gameMastering->removeElement($game);
        }
        return $this;
    }

    public function getCharacters(): ArrayCollection
    {
        return $this->characters;
    }

    public function setCharacters(ArrayCollection $characters): User
    {
        $this->characters = $characters;
        return $this;
    }

    public function addCharacter(Character $character): User
    {
        if (!$this->getCharacters($character)) {
            $this->characters->add($character);
        }
        return $this;
    }

    public function removeCharacter(Character $character): User
    {
        if ($this->getCharacters()->contains($character)) {
            $this->characters->removeElement($character);
        }
        return $this;
    }
}