<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130161618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE non_playable_character_templates_items DROP CONSTRAINT FK_2D02B2E1126F525E');
        $this->addSql('ALTER TABLE non_playable_character_templates_items ADD CONSTRAINT FK_2D02B2E1126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE non_playable_character_templates_items DROP CONSTRAINT fk_2d02b2e1126f525e');
        $this->addSql('ALTER TABLE non_playable_character_templates_items ADD CONSTRAINT fk_2d02b2e1126f525e FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
