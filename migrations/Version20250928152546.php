<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250928152546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // 1) Add the column as NULLable first
        $this->addSql(<<<'SQL'
            ALTER TABLE playable_character ADD token VARCHAR(255)
        SQL
        );

        // 2) Fill existing rows with a random md5
        $this->addSql(<<<'SQL'
            UPDATE playable_character
            SET token = MD5(RANDOM()::TEXT)
            WHERE token IS NULL
        SQL
        );

        // 3) Set the column to NOT NULL
        $this->addSql(<<<'SQL'
            ALTER TABLE playable_character ALTER COLUMN token SET NOT NULL
        SQL
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playable_character DROP token
        SQL);
    }
}
