<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ArmamentTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmamentTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ArmamentTemplate extends AbstractEncyclopedia
{
    use DateTimeTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $type;
    #[ORM\Column(type: 'integer')]
    private int $valueMin;
    #[ORM\Column(type: 'integer')]
    private int $valueMax;
    #[ORM\Column(type: 'integer')]
    private int $durabilityMin;
    #[ORM\Column(type: 'integer')]
    private int $durabilityMax;
    #[ORM\Column(type: 'text')]
    private string $description;
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ArmamentTemplate
    {
        $this->type = $type;
        return $this;
    }

    public function getValueMin(): int
    {
        return $this->valueMin;
    }

    public function setValueMin(int $valueMin): ArmamentTemplate
    {
        $this->valueMin = $valueMin;
        return $this;
    }

    public function getValueMax(): int
    {
        return $this->valueMax;
    }

    public function setValueMax(int $valueMax): ArmamentTemplate
    {
        $this->valueMax = $valueMax;
        return $this;
    }

    public function getDurabilityMin(): int
    {
        return $this->durabilityMin;
    }

    public function setDurabilityMin(int $durabilityMin): ArmamentTemplate
    {
        $this->durabilityMin = $durabilityMin;
        return $this;
    }

    public function getDurabilityMax(): int
    {
        return $this->durabilityMax;
    }

    public function setDurabilityMax(int $durabilityMax): ArmamentTemplate
    {
        $this->durabilityMax = $durabilityMax;
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

//    public function getMonster(): ?Monster
//    {
//        return $this->monster;
//    }
//
//    public function setMonster(?Monster $monster): ArmamentTemplate
//    {
//        $this->monster = $monster;
//        return $this;
//    }
//
//    public function getNonPlayableCharacter(): ?NonPlayableCharacter
//    {
//        return $this->nonPlayableCharacter;
//    }
//
//    public function setNonPlayableCharacter(?NonPlayableCharacter $nonPlayableCharacter): ArmamentTemplate
//    {
//        $this->nonPlayableCharacter = $nonPlayableCharacter;
//        return $this;
//    }
}