<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124161729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE non_playable_characters_spells (non_playable_character_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_94C7438C9388FCC9 (non_playable_character_id), INDEX IDX_94C7438C479EC90D (spell_id), PRIMARY KEY(non_playable_character_id, spell_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_playable_characters_items (non_playable_character_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_9D335C1C9388FCC9 (non_playable_character_id), INDEX IDX_9D335C1C126F525E (item_id), PRIMARY KEY(non_playable_character_id, item_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_playable_characters_skills (non_playable_character_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_C9215AA79388FCC9 (non_playable_character_id), INDEX IDX_C9215AA75585C142 (skill_id), PRIMARY KEY(non_playable_character_id, skill_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE non_playable_characters_spells ADD CONSTRAINT FK_94C7438C9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id)');
        $this->addSql('ALTER TABLE non_playable_characters_spells ADD CONSTRAINT FK_94C7438C479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
        $this->addSql('ALTER TABLE non_playable_characters_items ADD CONSTRAINT FK_9D335C1C9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id)');
        $this->addSql('ALTER TABLE non_playable_characters_items ADD CONSTRAINT FK_9D335C1C126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE non_playable_characters_skills ADD CONSTRAINT FK_C9215AA79388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id)');
        $this->addSql('ALTER TABLE non_playable_characters_skills ADD CONSTRAINT FK_C9215AA75585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items DROP FOREIGN KEY FK_7B6320CD5F0644D5');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items DROP FOREIGN KEY FK_7B6320CD126F525E');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills DROP FOREIGN KEY FK_3813E8995F0644D5');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills DROP FOREIGN KEY FK_3813E8995585C142');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells DROP FOREIGN KEY FK_65F5F1B25F0644D5');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells DROP FOREIGN KEY FK_65F5F1B2479EC90D');
        $this->addSql('DROP TABLE nonPlayableCharacters_items');
        $this->addSql('DROP TABLE nonPlayableCharacters_skills');
        $this->addSql('DROP TABLE nonPlayableCharacters_spells');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nonPlayableCharacters_items (item_id INT NOT NULL, nonPlayableCharacter_id INT NOT NULL, INDEX IDX_7B6320CD5F0644D5 (nonPlayableCharacter_id), INDEX IDX_7B6320CD126F525E (item_id), PRIMARY KEY(nonPlayableCharacter_id, item_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nonPlayableCharacters_skills (skill_id INT NOT NULL, nonPlayableCharacter_id INT NOT NULL, INDEX IDX_3813E8995F0644D5 (nonPlayableCharacter_id), INDEX IDX_3813E8995585C142 (skill_id), PRIMARY KEY(nonPlayableCharacter_id, skill_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nonPlayableCharacters_spells (spell_id INT NOT NULL, nonPlayableCharacter_id INT NOT NULL, INDEX IDX_65F5F1B2479EC90D (spell_id), INDEX IDX_65F5F1B25F0644D5 (nonPlayableCharacter_id), PRIMARY KEY(nonPlayableCharacter_id, spell_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items ADD CONSTRAINT FK_7B6320CD5F0644D5 FOREIGN KEY (nonPlayableCharacter_id) REFERENCES non_playable_character (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items ADD CONSTRAINT FK_7B6320CD126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills ADD CONSTRAINT FK_3813E8995F0644D5 FOREIGN KEY (nonPlayableCharacter_id) REFERENCES non_playable_character (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills ADD CONSTRAINT FK_3813E8995585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells ADD CONSTRAINT FK_65F5F1B25F0644D5 FOREIGN KEY (nonPlayableCharacter_id) REFERENCES non_playable_character (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells ADD CONSTRAINT FK_65F5F1B2479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE non_playable_characters_spells DROP FOREIGN KEY FK_94C7438C9388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_spells DROP FOREIGN KEY FK_94C7438C479EC90D');
        $this->addSql('ALTER TABLE non_playable_characters_items DROP FOREIGN KEY FK_9D335C1C9388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_items DROP FOREIGN KEY FK_9D335C1C126F525E');
        $this->addSql('ALTER TABLE non_playable_characters_skills DROP FOREIGN KEY FK_C9215AA79388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_skills DROP FOREIGN KEY FK_C9215AA75585C142');
        $this->addSql('DROP TABLE non_playable_characters_spells');
        $this->addSql('DROP TABLE non_playable_characters_items');
        $this->addSql('DROP TABLE non_playable_characters_skills');
    }
}
