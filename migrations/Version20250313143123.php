<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250313143123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE talent ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE talent ADD is_ready BOOLEAN DEFAULT true NOT NULL');
        $this->addSql('ALTER TABLE talent ADD is_private BOOLEAN DEFAULT false NOT NULL');
        $this->addSql('ALTER TABLE talent ADD CONSTRAINT FK_16D902F5DE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_16D902F5DE12AB56 ON talent (created_by)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE talent DROP CONSTRAINT FK_16D902F5DE12AB56');
        $this->addSql('DROP INDEX IDX_16D902F5DE12AB56');
        $this->addSql('ALTER TABLE talent DROP created_by');
        $this->addSql('ALTER TABLE talent DROP is_ready');
        $this->addSql('ALTER TABLE talent DROP is_private');
    }
}
