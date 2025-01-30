<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130095231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armament_template ADD is_ready BOOLEAN DEFAULT true NOT NULL');
        $this->addSql('ALTER TABLE armament_template ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE armament_template ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('COMMENT ON COLUMN armament_template.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN armament_template.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE item ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE monster_template ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE skill ALTER is_ready SET DEFAULT true');
        $this->addSql('ALTER TABLE spell ALTER is_ready SET DEFAULT true');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE armament_template DROP is_ready');
        $this->addSql('ALTER TABLE armament_template DROP created_at');
        $this->addSql('ALTER TABLE armament_template DROP updated_at');
        $this->addSql('ALTER TABLE skill ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE item ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE monster_template ALTER is_ready DROP DEFAULT');
        $this->addSql('ALTER TABLE spell ALTER is_ready DROP DEFAULT');
    }
}
