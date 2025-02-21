<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\CharacterTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class CharacterTemplate extends AbstractCharacterTemplate
{
    use HasDateTimeTrait;
    use HasGenerableStatsTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $title;
    #[ORM\JoinTable(name: 'character_templates_spells')]
    #[ORM\JoinColumn(name: 'character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'character_templates_skills')]
    #[ORM\JoinColumn(name: 'character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;

    #[ORM\JoinTable(name: 'character_templates_items')]
    #[ORM\JoinColumn(name: 'character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;

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

    public function setId(?int $id): CharacterTemplate
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): CharacterTemplate
    {
        $this->title = $title;
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    /** @param Spell[] $spells */
    public function setSpells(Collection|array $spells): CharacterTemplate
    {
        $this->spells = $spells;
        return $this;
    }

    public function addSpell(Spell $spell): CharacterTemplate
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): CharacterTemplate
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
    public function setItems(Collection|array $items): CharacterTemplate
    {
        $this->items = $items;
        return $this;
    }

    public function addItem(Item $item): CharacterTemplate
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }
        return $this;
    }

    public function removeItem(Item $item): CharacterTemplate
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
    public function setSkills(Collection|array $skills): CharacterTemplate
    {
        $this->skills = $skills;
        return $this;
    }

    public function addSkill(Skill $skill): CharacterTemplate
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): CharacterTemplate
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }
}