<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130151002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE non_playable_character_template (id SERIAL NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, strength_min INT NOT NULL, strength_max INT NOT NULL, intelligence_min INT NOT NULL, intelligence_max INT NOT NULL, stamina_min INT NOT NULL, stamina_max INT NOT NULL, agility_min INT NOT NULL, agility_max INT NOT NULL, charisma_min INT NOT NULL, charisma_max INT NOT NULL, health_point_min INT NOT NULL, health_point_max INT NOT NULL, mana_min INT NOT NULL, mana_max INT NOT NULL, is_ready BOOLEAN DEFAULT true NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9F46D872E48FD905 ON non_playable_character_template (game_id)');
        $this->addSql('COMMENT ON COLUMN non_playable_character_template.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN non_playable_character_template.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE non_playable_character_templates_spells (non_playable_character_template_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(non_playable_character_template_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_577BFCC3E76AD223 ON non_playable_character_templates_spells (non_playable_character_template_id)');
        $this->addSql('CREATE INDEX IDX_577BFCC3479EC90D ON non_playable_character_templates_spells (spell_id)');
        $this->addSql('CREATE TABLE non_playable_character_templates_items (non_playable_character_template_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(non_playable_character_template_id, item_id))');
        $this->addSql('CREATE INDEX IDX_2D02B2E1E76AD223 ON non_playable_character_templates_items (non_playable_character_template_id)');
        $this->addSql('CREATE INDEX IDX_2D02B2E1126F525E ON non_playable_character_templates_items (item_id)');
        $this->addSql('CREATE TABLE non_playable_character_templates_skills (non_playable_character_template_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(non_playable_character_template_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_A9DE5E8E76AD223 ON non_playable_character_templates_skills (non_playable_character_template_id)');
        $this->addSql('CREATE INDEX IDX_A9DE5E85585C142 ON non_playable_character_templates_skills (skill_id)');
        $this->addSql('ALTER TABLE non_playable_character_template ADD CONSTRAINT FK_9F46D872E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells ADD CONSTRAINT FK_577BFCC3E76AD223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells ADD CONSTRAINT FK_577BFCC3479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_items ADD CONSTRAINT FK_2D02B2E1E76AD223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_items ADD CONSTRAINT FK_2D02B2E1126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills ADD CONSTRAINT FK_A9DE5E8E76AD223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills ADD CONSTRAINT FK_A9DE5E85585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armament_template ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE item ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE monster_template ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE skill ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE spell ALTER is_ready SET DEFAULT true');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE non_playable_character_template DROP CONSTRAINT FK_9F46D872E48FD905');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells DROP CONSTRAINT FK_577BFCC3E76AD223');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells DROP CONSTRAINT FK_577BFCC3479EC90D');
        $this->addSql('ALTER TABLE non_playable_character_templates_items DROP CONSTRAINT FK_2D02B2E1E76AD223');
        $this->addSql('ALTER TABLE non_playable_character_templates_items DROP CONSTRAINT FK_2D02B2E1126F525E');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills DROP CONSTRAINT FK_A9DE5E8E76AD223');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills DROP CONSTRAINT FK_A9DE5E85585C142');
        $this->addSql('DROP TABLE non_playable_character_template');
        $this->addSql('DROP TABLE non_playable_character_templates_spells');
        $this->addSql('DROP TABLE non_playable_character_templates_items');
        $this->addSql('DROP TABLE non_playable_character_templates_skills');
        $this->addSql('ALTER TABLE spell ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE monster_template ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE item ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE armament_template ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE skill ALTER is_ready DROP DEFAULT');
    }
}
