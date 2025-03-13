<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250313145250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monster_talent (monster_id INT NOT NULL, talent_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(monster_id, talent_id))');
        $this->addSql('CREATE INDEX IDX_10194FD6C5FF1223 ON monster_talent (monster_id)');
        $this->addSql('CREATE INDEX IDX_10194FD618777CEF ON monster_talent (talent_id)');
        $this->addSql('CREATE TABLE non_playable_character_talent (non_playable_character_id INT NOT NULL, talent_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(non_playable_character_id, talent_id))');
        $this->addSql('CREATE INDEX IDX_E8D108D09388FCC9 ON non_playable_character_talent (non_playable_character_id)');
        $this->addSql('CREATE INDEX IDX_E8D108D018777CEF ON non_playable_character_talent (talent_id)');
        $this->addSql('ALTER TABLE monster_talent ADD CONSTRAINT FK_10194FD6C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_talent ADD CONSTRAINT FK_10194FD618777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_talent ADD CONSTRAINT FK_E8D108D09388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_talent ADD CONSTRAINT FK_E8D108D018777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE monster_talent DROP CONSTRAINT FK_10194FD6C5FF1223');
        $this->addSql('ALTER TABLE monster_talent DROP CONSTRAINT FK_10194FD618777CEF');
        $this->addSql('ALTER TABLE non_playable_character_talent DROP CONSTRAINT FK_E8D108D09388FCC9');
        $this->addSql('ALTER TABLE non_playable_character_talent DROP CONSTRAINT FK_E8D108D018777CEF');
        $this->addSql('DROP TABLE monster_talent');
        $this->addSql('DROP TABLE non_playable_character_talent');
    }
}
