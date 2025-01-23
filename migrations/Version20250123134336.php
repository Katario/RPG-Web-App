<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250123134336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292EE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_39EA292EE48FD905 ON armament (game_id)');
        $this->addSql('ALTER TABLE monster ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4E48FD905 ON monster (game_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4E48FD905');
        $this->addSql('DROP INDEX IDX_245EC6F4E48FD905 ON monster');
        $this->addSql('ALTER TABLE monster DROP game_id');
        $this->addSql('ALTER TABLE armament DROP FOREIGN KEY FK_39EA292EE48FD905');
        $this->addSql('DROP INDEX IDX_39EA292EE48FD905 ON armament');
        $this->addSql('ALTER TABLE armament DROP game_id');
    }
}
