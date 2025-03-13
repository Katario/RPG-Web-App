<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250313141339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_talent (character_id INT NOT NULL, talent_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(character_id, talent_id))');
        $this->addSql('CREATE INDEX IDX_B59BC1661136BE75 ON character_talent (character_id)');
        $this->addSql('CREATE INDEX IDX_B59BC16618777CEF ON character_talent (talent_id)');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT FK_B59BC1661136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT FK_B59BC16618777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_talents DROP CONSTRAINT fk_9e4369c11136be75');
        $this->addSql('ALTER TABLE characters_talents DROP CONSTRAINT fk_9e4369c118777cef');
        $this->addSql('DROP TABLE characters_talents');
        $this->addSql('ALTER TABLE "user" ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER updated_at DROP DEFAULT');
        $this->addSql('ALTER TABLE talent DROP value');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE characters_talents (character_id INT NOT NULL, talent_id INT NOT NULL, PRIMARY KEY(character_id, talent_id))');
        $this->addSql('CREATE INDEX idx_9e4369c118777cef ON characters_talents (talent_id)');
        $this->addSql('CREATE INDEX idx_9e4369c11136be75 ON characters_talents (character_id)');
        $this->addSql('ALTER TABLE characters_talents ADD CONSTRAINT fk_9e4369c11136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_talents ADD CONSTRAINT fk_9e4369c118777cef FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_talent DROP CONSTRAINT FK_B59BC1661136BE75');
        $this->addSql('ALTER TABLE character_talent DROP CONSTRAINT FK_B59BC16618777CEF');
        $this->addSql('DROP TABLE character_talent');
        $this->addSql('ALTER TABLE "user" ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE "user" ALTER updated_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE talent ADD value INT NOT NULL');
    }
}
