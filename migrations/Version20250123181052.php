<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250123181052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament ADD monster_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292EC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
        $this->addSql('CREATE INDEX IDX_39EA292EC5FF1223 ON armament (monster_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament DROP FOREIGN KEY FK_39EA292EC5FF1223');
        $this->addSql('DROP INDEX IDX_39EA292EC5FF1223 ON armament');
        $this->addSql('ALTER TABLE armament DROP monster_id');
    }
}
