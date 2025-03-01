<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250226154234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster ADD strength INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD stamina INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD agility INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD charisma INT NOT NULL');
        $this->addSql('ALTER TABLE monster DROP current_strength');
        $this->addSql('ALTER TABLE monster DROP max_strength');
        $this->addSql('ALTER TABLE monster DROP current_intelligence');
        $this->addSql('ALTER TABLE monster DROP max_intelligence');
        $this->addSql('ALTER TABLE monster DROP current_stamina');
        $this->addSql('ALTER TABLE monster DROP max_stamina');
        $this->addSql('ALTER TABLE monster DROP current_agility');
        $this->addSql('ALTER TABLE monster DROP max_agility');
        $this->addSql('ALTER TABLE monster DROP current_charisma');
        $this->addSql('ALTER TABLE monster DROP max_charisma');
        $this->addSql('ALTER TABLE non_playable_character ADD strength INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD stamina INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD agility INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD charisma INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character DROP current_strength');
        $this->addSql('ALTER TABLE non_playable_character DROP max_strength');
        $this->addSql('ALTER TABLE non_playable_character DROP current_intelligence');
        $this->addSql('ALTER TABLE non_playable_character DROP max_intelligence');
        $this->addSql('ALTER TABLE non_playable_character DROP current_stamina');
        $this->addSql('ALTER TABLE non_playable_character DROP max_stamina');
        $this->addSql('ALTER TABLE non_playable_character DROP current_agility');
        $this->addSql('ALTER TABLE non_playable_character DROP max_agility');
        $this->addSql('ALTER TABLE non_playable_character DROP current_charisma');
        $this->addSql('ALTER TABLE non_playable_character DROP max_charisma');
        $this->addSql('ALTER TABLE playable_character ADD strength INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD stamina INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD agility INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD charisma INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character DROP current_strength');
        $this->addSql('ALTER TABLE playable_character DROP max_strength');
        $this->addSql('ALTER TABLE playable_character DROP current_intelligence');
        $this->addSql('ALTER TABLE playable_character DROP max_intelligence');
        $this->addSql('ALTER TABLE playable_character DROP current_stamina');
        $this->addSql('ALTER TABLE playable_character DROP max_stamina');
        $this->addSql('ALTER TABLE playable_character DROP current_agility');
        $this->addSql('ALTER TABLE playable_character DROP max_agility');
        $this->addSql('ALTER TABLE playable_character DROP current_charisma');
        $this->addSql('ALTER TABLE playable_character DROP max_charisma');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE monster ADD current_strength INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_strength INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_agility INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_agility INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE monster DROP strength');
        $this->addSql('ALTER TABLE monster DROP intelligence');
        $this->addSql('ALTER TABLE monster DROP stamina');
        $this->addSql('ALTER TABLE monster DROP agility');
        $this->addSql('ALTER TABLE monster DROP charisma');
        $this->addSql('ALTER TABLE non_playable_character ADD current_strength INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_strength INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_agility INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_agility INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character DROP strength');
        $this->addSql('ALTER TABLE non_playable_character DROP intelligence');
        $this->addSql('ALTER TABLE non_playable_character DROP stamina');
        $this->addSql('ALTER TABLE non_playable_character DROP agility');
        $this->addSql('ALTER TABLE non_playable_character DROP charisma');
        $this->addSql('ALTER TABLE playable_character ADD current_strength INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_strength INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_intelligence INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_stamina INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_agility INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_agility INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_charisma INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character DROP strength');
        $this->addSql('ALTER TABLE playable_character DROP intelligence');
        $this->addSql('ALTER TABLE playable_character DROP stamina');
        $this->addSql('ALTER TABLE playable_character DROP agility');
        $this->addSql('ALTER TABLE playable_character DROP charisma');
    }
}
