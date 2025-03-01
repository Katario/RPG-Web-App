<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250226133835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster ADD kind VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE monster ADD level INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD current_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD max_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD kind VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD level INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD current_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD max_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD kind VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD level INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD current_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE playable_character ADD max_exhaust_points INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE monster DROP kind');
        $this->addSql('ALTER TABLE monster DROP level');
        $this->addSql('ALTER TABLE monster DROP current_health_points');
        $this->addSql('ALTER TABLE monster DROP max_health_points');
        $this->addSql('ALTER TABLE monster DROP current_mana_points');
        $this->addSql('ALTER TABLE monster DROP max_mana_points');
        $this->addSql('ALTER TABLE monster DROP current_action_points');
        $this->addSql('ALTER TABLE monster DROP max_action_points');
        $this->addSql('ALTER TABLE monster DROP current_exhaust_points');
        $this->addSql('ALTER TABLE monster DROP max_exhaust_points');
        $this->addSql('ALTER TABLE playable_character DROP kind');
        $this->addSql('ALTER TABLE playable_character DROP level');
        $this->addSql('ALTER TABLE playable_character DROP current_health_points');
        $this->addSql('ALTER TABLE playable_character DROP max_health_points');
        $this->addSql('ALTER TABLE playable_character DROP current_mana_points');
        $this->addSql('ALTER TABLE playable_character DROP max_mana_points');
        $this->addSql('ALTER TABLE playable_character DROP current_action_points');
        $this->addSql('ALTER TABLE playable_character DROP max_action_points');
        $this->addSql('ALTER TABLE playable_character DROP current_exhaust_points');
        $this->addSql('ALTER TABLE playable_character DROP max_exhaust_points');
        $this->addSql('ALTER TABLE non_playable_character DROP kind');
        $this->addSql('ALTER TABLE non_playable_character DROP level');
        $this->addSql('ALTER TABLE non_playable_character DROP current_health_points');
        $this->addSql('ALTER TABLE non_playable_character DROP max_health_points');
        $this->addSql('ALTER TABLE non_playable_character DROP current_mana_points');
        $this->addSql('ALTER TABLE non_playable_character DROP max_mana_points');
        $this->addSql('ALTER TABLE non_playable_character DROP current_action_points');
        $this->addSql('ALTER TABLE non_playable_character DROP max_action_points');
        $this->addSql('ALTER TABLE non_playable_character DROP current_exhaust_points');
        $this->addSql('ALTER TABLE non_playable_character DROP max_exhaust_points');
    }
}
