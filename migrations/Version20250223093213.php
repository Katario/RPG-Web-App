<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223093213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD weight INT NOT NULL');
        $this->addSql('ALTER TABLE skill ADD exhaust_cost INT NOT NULL');
        $this->addSql('ALTER TABLE skill DROP mana_cost');
        $this->addSql('ALTER TABLE skill DROP physical_cost');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE item DROP weight');
        $this->addSql('ALTER TABLE skill ADD physical_cost INT NOT NULL');
        $this->addSql('ALTER TABLE skill RENAME COLUMN exhaust_cost TO mana_cost');
    }
}
