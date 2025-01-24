<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124161417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament DROP FOREIGN KEY FK_39EA292E9388FCC9');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292E9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament DROP FOREIGN KEY FK_39EA292E9388FCC9');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292E9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES monster (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
