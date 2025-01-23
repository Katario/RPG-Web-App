<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250123173930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F44D2BFA40');
        $this->addSql('DROP INDEX IDX_245EC6F44D2BFA40 ON monster');
        $this->addSql('ALTER TABLE monster DROP armaments_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster ADD armaments_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F44D2BFA40 FOREIGN KEY (armaments_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_245EC6F44D2BFA40 ON monster (armaments_id)');
    }
}
