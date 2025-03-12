<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312175930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE armament ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE armament ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('COMMENT ON COLUMN armament.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN armament.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE armament_template ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE character_class ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE character_template ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE game ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE game ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE game ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('COMMENT ON COLUMN game.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN game.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE item ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE kind ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE monster ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE monster_template ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE non_playable_character ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE non_playable_character_template ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE playable_character ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE skill ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE specie ADD note TEXT NOT NULL DEFAULT \'\' ');
        $this->addSql('ALTER TABLE spell ADD note TEXT NOT NULL DEFAULT \'\' ');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_template DROP note');
        $this->addSql('ALTER TABLE kind DROP note');
        $this->addSql('ALTER TABLE game DROP created_at');
        $this->addSql('ALTER TABLE game DROP updated_at');
        $this->addSql('ALTER TABLE game DROP note');
        $this->addSql('ALTER TABLE armament DROP created_at');
        $this->addSql('ALTER TABLE armament DROP updated_at');
        $this->addSql('ALTER TABLE armament DROP note');
        $this->addSql('ALTER TABLE monster DROP note');
        $this->addSql('ALTER TABLE playable_character DROP note');
        $this->addSql('ALTER TABLE non_playable_character_template DROP note');
        $this->addSql('ALTER TABLE non_playable_character DROP note');
        $this->addSql('ALTER TABLE monster_template DROP note');
        $this->addSql('ALTER TABLE skill DROP note');
        $this->addSql('ALTER TABLE spell DROP note');
        $this->addSql('ALTER TABLE specie DROP note');
        $this->addSql('ALTER TABLE armament_template DROP note');
        $this->addSql('ALTER TABLE item DROP note');
        $this->addSql('ALTER TABLE character_class DROP note');
    }
}
