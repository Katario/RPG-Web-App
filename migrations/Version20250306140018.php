<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306140018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_template DROP min_strength');
        $this->addSql('ALTER TABLE character_template DROP max_strength');
        $this->addSql('ALTER TABLE character_template DROP min_intelligence');
        $this->addSql('ALTER TABLE character_template DROP max_intelligence');
        $this->addSql('ALTER TABLE character_template DROP min_stamina');
        $this->addSql('ALTER TABLE character_template DROP max_stamina');
        $this->addSql('ALTER TABLE character_template DROP min_agility');
        $this->addSql('ALTER TABLE character_template DROP max_agility');
        $this->addSql('ALTER TABLE character_template DROP min_charisma');
        $this->addSql('ALTER TABLE character_template DROP max_charisma');
        $this->addSql('ALTER TABLE monster DROP strength');
        $this->addSql('ALTER TABLE monster DROP intelligence');
        $this->addSql('ALTER TABLE monster DROP stamina');
        $this->addSql('ALTER TABLE monster DROP agility');
        $this->addSql('ALTER TABLE monster DROP charisma');
        $this->addSql('ALTER TABLE monster_template DROP min_strength');
        $this->addSql('ALTER TABLE monster_template DROP max_strength');
        $this->addSql('ALTER TABLE monster_template DROP min_intelligence');
        $this->addSql('ALTER TABLE monster_template DROP max_intelligence');
        $this->addSql('ALTER TABLE monster_template DROP min_stamina');
        $this->addSql('ALTER TABLE monster_template DROP max_stamina');
        $this->addSql('ALTER TABLE monster_template DROP min_agility');
        $this->addSql('ALTER TABLE monster_template DROP max_agility');
        $this->addSql('ALTER TABLE monster_template DROP min_charisma');
        $this->addSql('ALTER TABLE monster_template DROP max_charisma');
        $this->addSql('ALTER TABLE non_playable_character DROP strength');
        $this->addSql('ALTER TABLE non_playable_character DROP intelligence');
        $this->addSql('ALTER TABLE non_playable_character DROP stamina');
        $this->addSql('ALTER TABLE non_playable_character DROP agility');
        $this->addSql('ALTER TABLE non_playable_character DROP charisma');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_strength');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_strength');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_intelligence');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_intelligence');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_stamina');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_stamina');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_agility');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_agility');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_charisma');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_charisma');
        $this->addSql('ALTER TABLE playable_character DROP strength');
        $this->addSql('ALTER TABLE playable_character DROP intelligence');
        $this->addSql('ALTER TABLE playable_character DROP stamina');
        $this->addSql('ALTER TABLE playable_character DROP agility');
        $this->addSql('ALTER TABLE playable_character DROP charisma');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE monster ADD strength INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD stamina INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD agility INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD charisma INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_strength INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_strength INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_agility INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_agility INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD strength INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD stamina INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD agility INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD charisma INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_strength INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_strength INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_agility INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_agility INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD strength INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD stamina INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD agility INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD charisma INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_strength INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_strength INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_agility INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_agility INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_charisma INT NOT NULL');
    }
}
