<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\MonsterTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class MonsterTemplate extends AbstractCharacterTemplate
{
    use HasDateTimeTrait;
    use HasGenerableStatsTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\JoinTable(name: 'monster_templates_spells')]
    #[ORM\JoinColumn(name: 'monster_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;

    #[ORM\JoinTable(name: 'monster_templates_items')]
    #[ORM\JoinColumn(name: 'monste_templater_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;

    #[ORM\JoinTable(name: 'monster_templates_skills')]
    #[ORM\JoinColumn(name: 'monster_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id', onDelete: 'cascade')]
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

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    /** @param Spell[] $spells */
    public function setSpells(Collection|array $spells): MonsterTemplate
    {
        $this->spells = $spells;
        return $this;
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

    /** @param Item[] $items */
    public function setItems(Collection|array $items): MonsterTemplate
    {
        $this->items = $items;
        return $this;
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

    /** @param Skill[] $skills */
    public function setSkills(Collection|array $skills): MonsterTemplate
    {
        $this->skills = $skills;
        return $this;
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