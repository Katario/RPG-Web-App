<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130092600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monster_template (id SERIAL NOT NULL, family VARCHAR(255) NOT NULL, kind VARCHAR(255) NOT NULL, strength_min INT NOT NULL, strength_max INT NOT NULL, intelligence_min INT NOT NULL, intelligence_max INT NOT NULL, stamina_min INT NOT NULL, stamina_max INT NOT NULL, agility_min INT NOT NULL, agility_max INT NOT NULL, charisma_min INT NOT NULL, charisma_max INT NOT NULL, health_point_min INT NOT NULL, health_point_max INT NOT NULL, mana_min INT NOT NULL, mana_max INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE monster_templates_spells (monster_template_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(monster_template_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_1E44CA762D30EB4A ON monster_templates_spells (monster_template_id)');
        $this->addSql('CREATE INDEX IDX_1E44CA76479EC90D ON monster_templates_spells (spell_id)');
        $this->addSql('CREATE TABLE monster_templates_items (monste_templater_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(monste_templater_id, item_id))');
        $this->addSql('CREATE INDEX IDX_7B734A0718774676 ON monster_templates_items (monste_templater_id)');
        $this->addSql('CREATE INDEX IDX_7B734A07126F525E ON monster_templates_items (item_id)');
        $this->addSql('CREATE TABLE monster_templates_skills (monster_template_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(monster_template_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_43A2D35D2D30EB4A ON monster_templates_skills (monster_template_id)');
        $this->addSql('CREATE INDEX IDX_43A2D35D5585C142 ON monster_templates_skills (skill_id)');
        $this->addSql('ALTER TABLE monster_templates_spells ADD CONSTRAINT FK_1E44CA762D30EB4A FOREIGN KEY (monster_template_id) REFERENCES monster_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_spells ADD CONSTRAINT FK_1E44CA76479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_items ADD CONSTRAINT FK_7B734A0718774676 FOREIGN KEY (monste_templater_id) REFERENCES monster_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_items ADD CONSTRAINT FK_7B734A07126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_skills ADD CONSTRAINT FK_43A2D35D2D30EB4A FOREIGN KEY (monster_template_id) REFERENCES monster_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_skills ADD CONSTRAINT FK_43A2D35D5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE monster_templates_spells DROP CONSTRAINT FK_1E44CA762D30EB4A');
        $this->addSql('ALTER TABLE monster_templates_spells DROP CONSTRAINT FK_1E44CA76479EC90D');
        $this->addSql('ALTER TABLE monster_templates_items DROP CONSTRAINT FK_7B734A0718774676');
        $this->addSql('ALTER TABLE monster_templates_items DROP CONSTRAINT FK_7B734A07126F525E');
        $this->addSql('ALTER TABLE monster_templates_skills DROP CONSTRAINT FK_43A2D35D2D30EB4A');
        $this->addSql('ALTER TABLE monster_templates_skills DROP CONSTRAINT FK_43A2D35D5585C142');
        $this->addSql('DROP TABLE monster_template');
        $this->addSql('DROP TABLE monster_templates_spells');
        $this->addSql('DROP TABLE monster_templates_items');
        $this->addSql('DROP TABLE monster_templates_skills');
    }
}
