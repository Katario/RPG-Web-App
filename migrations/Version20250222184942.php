<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250222184942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament ADD character_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292E1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_39EA292E1136BE75 ON armament (character_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE armament DROP CONSTRAINT FK_39EA292E1136BE75');
        $this->addSql('DROP INDEX IDX_39EA292E1136BE75');
        $this->addSql('ALTER TABLE armament DROP character_id');
    }
}
