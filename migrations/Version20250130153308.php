<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130153308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_template (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, strength_min INT NOT NULL, strength_max INT NOT NULL, intelligence_min INT NOT NULL, intelligence_max INT NOT NULL, stamina_min INT NOT NULL, stamina_max INT NOT NULL, agility_min INT NOT NULL, agility_max INT NOT NULL, charisma_min INT NOT NULL, charisma_max INT NOT NULL, health_point_min INT NOT NULL, health_point_max INT NOT NULL, mana_min INT NOT NULL, mana_max INT NOT NULL, is_ready BOOLEAN DEFAULT true NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN character_template.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN character_template.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE character_templates_spells (character_template_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(character_template_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_3AA8E4FC1B0A514 ON character_templates_spells (character_template_id)');
        $this->addSql('CREATE INDEX IDX_3AA8E4FC479EC90D ON character_templates_spells (spell_id)');
        $this->addSql('CREATE TABLE character_templates_items (character_template_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(character_template_id, item_id))');
        $this->addSql('CREATE INDEX IDX_23FE66F41B0A514 ON character_templates_items (character_template_id)');
        $this->addSql('CREATE INDEX IDX_23FE66F4126F525E ON character_templates_items (item_id)');
        $this->addSql('CREATE TABLE character_templates_skills (character_template_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(character_template_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_674EFDD71B0A514 ON character_templates_skills (character_template_id)');
        $this->addSql('CREATE INDEX IDX_674EFDD75585C142 ON character_templates_skills (skill_id)');
        $this->addSql('ALTER TABLE character_templates_spells ADD CONSTRAINT FK_3AA8E4FC1B0A514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_spells ADD CONSTRAINT FK_3AA8E4FC479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_items ADD CONSTRAINT FK_23FE66F41B0A514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_items ADD CONSTRAINT FK_23FE66F4126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_skills ADD CONSTRAINT FK_674EFDD71B0A514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_skills ADD CONSTRAINT FK_674EFDD75585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_template DROP CONSTRAINT fk_9f46d872e48fd905');
        $this->addSql('DROP INDEX idx_9f46d872e48fd905');
        $this->addSql('ALTER TABLE non_playable_character_template DROP game_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_templates_spells DROP CONSTRAINT FK_3AA8E4FC1B0A514');
        $this->addSql('ALTER TABLE character_templates_spells DROP CONSTRAINT FK_3AA8E4FC479EC90D');
        $this->addSql('ALTER TABLE character_templates_items DROP CONSTRAINT FK_23FE66F41B0A514');
        $this->addSql('ALTER TABLE character_templates_items DROP CONSTRAINT FK_23FE66F4126F525E');
        $this->addSql('ALTER TABLE character_templates_skills DROP CONSTRAINT FK_674EFDD71B0A514');
        $this->addSql('ALTER TABLE character_templates_skills DROP CONSTRAINT FK_674EFDD75585C142');
        $this->addSql('DROP TABLE character_template');
        $this->addSql('DROP TABLE character_templates_spells');
        $this->addSql('DROP TABLE character_templates_items');
        $this->addSql('DROP TABLE character_templates_skills');
        $this->addSql('ALTER TABLE non_playable_character_template ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE non_playable_character_template ADD CONSTRAINT fk_9f46d872e48fd905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9f46d872e48fd905 ON non_playable_character_template (game_id)');
    }
}
