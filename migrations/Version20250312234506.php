<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312234506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE characters_talents (character_id INT NOT NULL, talent_id INT NOT NULL, PRIMARY KEY(character_id, talent_id))');
        $this->addSql('CREATE INDEX IDX_9E4369C11136BE75 ON characters_talents (character_id)');
        $this->addSql('CREATE INDEX IDX_9E4369C118777CEF ON characters_talents (talent_id)');
        $this->addSql('ALTER TABLE characters_talents ADD CONSTRAINT FK_9E4369C11136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_talents ADD CONSTRAINT FK_9E4369C118777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE "user" ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE armament ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE armament ALTER updated_at DROP DEFAULT');
        $this->addSql('ALTER TABLE armament ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE armament_template ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE character_class ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE character_template ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE game ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE game ALTER updated_at DROP DEFAULT');
        $this->addSql('ALTER TABLE game ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE item ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE kind ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE monster ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE monster_template ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE non_playable_character ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE non_playable_character_template ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE playable_character ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE skill ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE specie ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE spell ALTER note DROP DEFAULT');
        $this->addSql('ALTER TABLE talent ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE talent ADD value INT NOT NULL');
        $this->addSql('ALTER TABLE talent ADD description TEXT NOT NULL');
        $this->addSql('ALTER TABLE talent ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE talent ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE talent ADD note TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN talent.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN talent.updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE characters_talents DROP CONSTRAINT FK_9E4369C11136BE75');
        $this->addSql('ALTER TABLE characters_talents DROP CONSTRAINT FK_9E4369C118777CEF');
        $this->addSql('DROP TABLE characters_talents');
        $this->addSql('ALTER TABLE playable_character ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE specie ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE character_template ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE character_class ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE spell ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE armament_template ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE armament ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE armament ALTER updated_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE armament ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE game ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE game ALTER updated_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE game ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE monster_template ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE non_playable_character ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE non_playable_character_template ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE "user" DROP created_at');
        $this->addSql('ALTER TABLE "user" DROP updated_at');
        $this->addSql('ALTER TABLE skill ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE monster ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE kind ALTER note SET DEFAULT \'\'');
        $this->addSql('ALTER TABLE talent DROP name');
        $this->addSql('ALTER TABLE talent DROP value');
        $this->addSql('ALTER TABLE talent DROP description');
        $this->addSql('ALTER TABLE talent DROP created_at');
        $this->addSql('ALTER TABLE talent DROP updated_at');
        $this->addSql('ALTER TABLE talent DROP note');
        $this->addSql('ALTER TABLE item ALTER note SET DEFAULT \'\'');
    }
}
