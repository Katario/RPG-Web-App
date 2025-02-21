<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ArmamentTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmamentTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ArmamentTemplate extends Encyclopedia
{
    use HasDateTimeTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $category;
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $value;
    #[ORM\Column(type: 'integer')]
    private int $minDurability;
    #[ORM\Column(type: 'integer')]
    private int $maxDurability;
    #[ORM\Column(type: 'integer')]
    private int $weight;
    #[ORM\Column(type: 'text')]
    private string $description = '';
    #[ORM\JoinTable(name: 'armament_templates_skills')]
    #[ORM\JoinColumn(name: 'armament_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;
    #[ORM\JoinTable(name: 'armament_templates_spells')]
    #[ORM\JoinColumn(name: 'armament_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->spells = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ArmamentTemplate
    {
        $this->name = $name;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): ArmamentTemplate
    {
        $this->category = $category;
        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): ArmamentTemplate
    {
        $this->value = $value;
        return $this;
    }

    public function getMinDurability(): int
    {
        return $this->minDurability;
    }

    public function setMinDurability(int $minDurability): ArmamentTemplate
    {
        $this->minDurability = $minDurability;
        return $this;
    }

    public function getMaxDurability(): int
    {
        return $this->maxDurability;
    }

    public function setMaxDurability(int $maxDurability): ArmamentTemplate
    {
        $this->maxDurability = $maxDurability;
        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): ArmamentTemplate
    {
        $this->weight = $weight;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): ArmamentTemplate
    {
        $this->description = $description;
        return $this;
    }

    public function getSkills(): Collection|array
    {
        return $this->skills;
    }

    /** @param Skill[] $skills */
    public function setSkills(Collection|array $skills): ArmamentTemplate
    {
        $this->skills = $skills;
        return $this;
    }

    public function addSkill(Skill $skill): ArmamentTemplate
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): ArmamentTemplate
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    /** @param Spell[] $spells */
    public function setSpells(Collection|array $spells): ArmamentTemplate
    {
        $this->spells = $spells;
        return $this;
    }

    public function addSpell(Spell $spell): ArmamentTemplate
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): ArmamentTemplate
    {
        if ($this->getSpells()->contains($spell)) {
            $this->spells->removeElement($spell);
        }
        return $this;
    }
}