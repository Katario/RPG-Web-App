<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250128181854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armament_template (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, value_min INT NOT NULL, value_max INT NOT NULL, durability_min INT NOT NULL, durability_max INT NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE armament_templates_skills (armament_template_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(armament_template_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_B3574412F5E4EFC3 ON armament_templates_skills (armament_template_id)');
        $this->addSql('CREATE INDEX IDX_B35744125585C142 ON armament_templates_skills (skill_id)');
        $this->addSql('CREATE TABLE armament_templates_spells (armament_template_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(armament_template_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_EEB15D39F5E4EFC3 ON armament_templates_spells (armament_template_id)');
        $this->addSql('CREATE INDEX IDX_EEB15D39479EC90D ON armament_templates_spells (spell_id)');
        $this->addSql('ALTER TABLE armament_templates_skills ADD CONSTRAINT FK_B3574412F5E4EFC3 FOREIGN KEY (armament_template_id) REFERENCES armament_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armament_templates_skills ADD CONSTRAINT FK_B35744125585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armament_templates_spells ADD CONSTRAINT FK_EEB15D39F5E4EFC3 FOREIGN KEY (armament_template_id) REFERENCES armament_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armament_templates_spells ADD CONSTRAINT FK_EEB15D39479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE armament_templates_skills DROP CONSTRAINT FK_B3574412F5E4EFC3');
        $this->addSql('ALTER TABLE armament_templates_skills DROP CONSTRAINT FK_B35744125585C142');
        $this->addSql('ALTER TABLE armament_templates_spells DROP CONSTRAINT FK_EEB15D39F5E4EFC3');
        $this->addSql('ALTER TABLE armament_templates_spells DROP CONSTRAINT FK_EEB15D39479EC90D');
        $this->addSql('DROP TABLE armament_template');
        $this->addSql('DROP TABLE armament_templates_skills');
        $this->addSql('DROP TABLE armament_templates_spells');
    }
}
