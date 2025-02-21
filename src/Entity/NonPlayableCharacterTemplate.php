<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\NonPlayableCharacterTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class NonPlayableCharacterTemplate extends AbstractCharacterTemplate
{
    use HasDateTimeTrait;
    use HasGenerableStatsTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $title;
    #[ORM\JoinTable(name: 'non_playable_character_templates_spells')]
    #[ORM\JoinColumn(name: 'non_playable_character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'non_playable_character_templates_items')]
    #[ORM\JoinColumn(name: 'non_playable_character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'non_playable_character_templates_skills')]
    #[ORM\JoinColumn(name: 'non_playable_character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
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

    public function setId(?int $id): NonPlayableCharacterTemplate
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): NonPlayableCharacterTemplate
    {
        $this->title = $title;
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    /** @param Spell[] $spells */
    public function setSpells(Collection|array $spells): NonPlayableCharacterTemplate
    {
        $this->spells = $spells;
        return $this;
    }

    public function addSpell(Spell $spell): NonPlayableCharacterTemplate
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): NonPlayableCharacterTemplate
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
    public function setItems(Collection|array $items): NonPlayableCharacterTemplate
    {
        $this->items = $items;
        return $this;
    }

    public function addItem(Item $item): NonPlayableCharacterTemplate
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }
        return $this;
    }

    public function removeItem(Item $item): NonPlayableCharacterTemplate
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
    public function setSkills(Collection|array $skills): NonPlayableCharacterTemplate
    {
        $this->skills = $skills;
        return $this;
    }

    public function addSkill(Skill $skill): NonPlayableCharacterTemplate
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): NonPlayableCharacterTemplate
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }
}