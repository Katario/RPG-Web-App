<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223000101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament_template ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE armament_template ADD CONSTRAINT FK_910FD593DE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_910FD593DE12AB56 ON armament_template (created_by)');
        $this->addSql('ALTER TABLE character_template ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE character_template ADD kind VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD min_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD max_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE character_template ADD CONSTRAINT FK_CF61F612DE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CF61F612DE12AB56 ON character_template (created_by)');
        $this->addSql('ALTER TABLE item ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EDE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1F1B251EDE12AB56 ON item (created_by)');
        $this->addSql('ALTER TABLE monster_template ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monster_template ADD kind VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD min_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD max_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE monster_template ADD CONSTRAINT FK_21A4530FDE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_21A4530FDE12AB56 ON monster_template (created_by)');
        $this->addSql('ALTER TABLE non_playable_character_template ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD kind VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_health_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_mana_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_action_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD min_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD max_exhaust_points INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD CONSTRAINT FK_9F46D872DE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9F46D872DE12AB56 ON non_playable_character_template (created_by)');
        $this->addSql('ALTER TABLE skill ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477DE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5E3DE477DE12AB56 ON skill (created_by)');
        $this->addSql('ALTER TABLE spell ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DDE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D03FCD8DDE12AB56 ON spell (created_by)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE armament_template DROP CONSTRAINT FK_910FD593DE12AB56');
        $this->addSql('DROP INDEX IDX_910FD593DE12AB56');
        $this->addSql('ALTER TABLE armament_template DROP created_by');
        $this->addSql('ALTER TABLE spell DROP CONSTRAINT FK_D03FCD8DDE12AB56');
        $this->addSql('DROP INDEX IDX_D03FCD8DDE12AB56');
        $this->addSql('ALTER TABLE spell DROP created_by');
        $this->addSql('ALTER TABLE skill DROP CONSTRAINT FK_5E3DE477DE12AB56');
        $this->addSql('DROP INDEX IDX_5E3DE477DE12AB56');
        $this->addSql('ALTER TABLE skill DROP created_by');
        $this->addSql('ALTER TABLE non_playable_character_template DROP CONSTRAINT FK_9F46D872DE12AB56');
        $this->addSql('DROP INDEX IDX_9F46D872DE12AB56');
        $this->addSql('ALTER TABLE non_playable_character_template DROP created_by');
        $this->addSql('ALTER TABLE non_playable_character_template DROP kind');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_health_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_health_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_mana_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_mana_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_action_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_action_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP min_exhaust_points');
        $this->addSql('ALTER TABLE non_playable_character_template DROP max_exhaust_points');
        $this->addSql('ALTER TABLE monster_template DROP CONSTRAINT FK_21A4530FDE12AB56');
        $this->addSql('DROP INDEX IDX_21A4530FDE12AB56');
        $this->addSql('ALTER TABLE monster_template DROP created_by');
        $this->addSql('ALTER TABLE monster_template DROP kind');
        $this->addSql('ALTER TABLE monster_template DROP min_health_points');
        $this->addSql('ALTER TABLE monster_template DROP max_health_points');
        $this->addSql('ALTER TABLE monster_template DROP min_mana_points');
        $this->addSql('ALTER TABLE monster_template DROP max_mana_points');
        $this->addSql('ALTER TABLE monster_template DROP min_action_points');
        $this->addSql('ALTER TABLE monster_template DROP max_action_points');
        $this->addSql('ALTER TABLE monster_template DROP min_exhaust_points');
        $this->addSql('ALTER TABLE monster_template DROP max_exhaust_points');
        $this->addSql('ALTER TABLE item DROP CONSTRAINT FK_1F1B251EDE12AB56');
        $this->addSql('DROP INDEX IDX_1F1B251EDE12AB56');
        $this->addSql('ALTER TABLE item DROP created_by');
        $this->addSql('ALTER TABLE character_template DROP CONSTRAINT FK_CF61F612DE12AB56');
        $this->addSql('DROP INDEX IDX_CF61F612DE12AB56');
        $this->addSql('ALTER TABLE character_template DROP created_by');
        $this->addSql('ALTER TABLE character_template DROP kind');
        $this->addSql('ALTER TABLE character_template DROP min_health_points');
        $this->addSql('ALTER TABLE character_template DROP max_health_points');
        $this->addSql('ALTER TABLE character_template DROP min_mana_points');
        $this->addSql('ALTER TABLE character_template DROP max_mana_points');
        $this->addSql('ALTER TABLE character_template DROP min_action_points');
        $this->addSql('ALTER TABLE character_template DROP max_action_points');
        $this->addSql('ALTER TABLE character_template DROP min_exhaust_points');
        $this->addSql('ALTER TABLE character_template DROP max_exhaust_points');
    }
}
