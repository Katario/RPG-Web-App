<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\MonsterTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class MonsterTemplate extends AbstractEncyclopedia
{
    use DateTimeTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $family;
    #[ORM\Column(type: 'string')]
    private string $kind;
    #[ORM\Column(type: 'integer')]
    private int $strengthMin;
    #[ORM\Column(type: 'integer')]
    private int $strengthMax;
    #[ORM\Column(type: 'integer')]
    private int $intelligenceMin;
    #[ORM\Column(type: 'integer')]
    private int $intelligenceMax;
    #[ORM\Column(type: 'integer')]
    private int $staminaMin;
    #[ORM\Column(type: 'integer')]
    private int $staminaMax;
    #[ORM\Column(type: 'integer')]
    private int $agilityMin;
    #[ORM\Column(type: 'integer')]
    private int $agilityMax;
    #[ORM\Column(type: 'integer')]
    private int $charismaMin;
    #[ORM\Column(type: 'integer')]
    private int $charismaMax;
    #[ORM\Column(type: 'integer')]
    private int $healthPointMin;
    #[ORM\Column(type: 'integer')]
    private int $healthPointMax;
    #[ORM\Column(type: 'integer')]
    private int $manaMin;
    #[ORM\Column(type: 'integer')]
    private int $manaMax;

    #[ORM\JoinTable(name: 'monster_templates_spells')]
    #[ORM\JoinColumn(name: 'monster_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;

    #[ORM\JoinTable(name: 'monster_templates_items')]
    #[ORM\JoinColumn(name: 'monste_templater_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;

    #[ORM\JoinTable(name: 'monster_templates_skills')]
    #[ORM\JoinColumn(name: 'monster_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;


    public function __construct()
    {
        $this->spells = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): MonsterTemplate
    {
        $this->id = $id;
        return $this;
    }

    public function getFamily(): string
    {
        return $this->family;
    }

    public function setFamily(string $family): MonsterTemplate
    {
        $this->family = $family;
        return $this;
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function setKind(string $kind): MonsterTemplate
    {
        $this->kind = $kind;
        return $this;
    }

    public function getStrengthMin(): int
    {
        return $this->strengthMin;
    }

    public function setStrengthMin(int $strengthMin): MonsterTemplate
    {
        $this->strengthMin = $strengthMin;
        return $this;
    }

    public function getStrengthMax(): int
    {
        return $this->strengthMax;
    }

    public function setStrengthMax(int $strengthMax): MonsterTemplate
    {
        $this->strengthMax = $strengthMax;
        return $this;
    }

    public function getIntelligenceMin(): int
    {
        return $this->intelligenceMin;
    }

    public function setIntelligenceMin(int $intelligenceMin): MonsterTemplate
    {
        $this->intelligenceMin = $intelligenceMin;
        return $this;
    }

    public function getIntelligenceMax(): int
    {
        return $this->intelligenceMax;
    }

    public function setIntelligenceMax(int $intelligenceMax): MonsterTemplate
    {
        $this->intelligenceMax = $intelligenceMax;
        return $this;
    }

    public function getStaminaMin(): int
    {
        return $this->staminaMin;
    }

    public function setStaminaMin(int $staminaMin): MonsterTemplate
    {
        $this->staminaMin = $staminaMin;
        return $this;
    }

    public function getStaminaMax(): int
    {
        return $this->staminaMax;
    }

    public function setStaminaMax(int $staminaMax): MonsterTemplate
    {
        $this->staminaMax = $staminaMax;
        return $this;
    }

    public function getAgilityMin(): int
    {
        return $this->agilityMin;
    }

    public function setAgilityMin(int $agilityMin): MonsterTemplate
    {
        $this->agilityMin = $agilityMin;
        return $this;
    }

    public function getAgilityMax(): int
    {
        return $this->agilityMax;
    }

    public function setAgilityMax(int $agilityMax): MonsterTemplate
    {
        $this->agilityMax = $agilityMax;
        return $this;
    }

    public function getCharismaMin(): int
    {
        return $this->charismaMin;
    }

    public function setCharismaMin(int $charismaMin): MonsterTemplate
    {
        $this->charismaMin = $charismaMin;
        return $this;
    }

    public function getCharismaMax(): int
    {
        return $this->charismaMax;
    }

    public function setCharismaMax(int $charismaMax): MonsterTemplate
    {
        $this->charismaMax = $charismaMax;
        return $this;
    }

    public function getHealthPointMin(): int
    {
        return $this->healthPointMin;
    }

    public function setHealthPointMin(int $healthPointMin): MonsterTemplate
    {
        $this->healthPointMin = $healthPointMin;
        return $this;
    }

    public function getHealthPointMax(): int
    {
        return $this->healthPointMax;
    }

    public function setHealthPointMax(int $healthPointMax): MonsterTemplate
    {
        $this->healthPointMax = $healthPointMax;
        return $this;
    }

    public function getManaMin(): int
    {
        return $this->manaMin;
    }

    public function setManaMin(int $manaMin): MonsterTemplate
    {
        $this->manaMin = $manaMin;
        return $this;
    }

    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    public function setManaMax(int $manaMax): MonsterTemplate
    {
        $this->manaMax = $manaMax;
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): MonsterTemplate
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): MonsterTemplate
    {
        if ($this->getSpells()->contains($spell)) {
            $this->spells->removeElement($spell);
        }
        return $this;
    }

    public function getItems(): Collection|array
    {
        return $this->items;
    }

    public function addItem(Item $item): MonsterTemplate
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }
        return $this;
    }

    public function removeItem(Item $item): MonsterTemplate
    {
        if ($this->getItems()->contains($item)) {
            $this->items->removeElement($item);
        }
        return $this;
    }

    public function getSkills(): Collection|array
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): MonsterTemplate
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): MonsterTemplate
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }
}