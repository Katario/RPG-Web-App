<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124152732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nonPlayableCharacters_spells (spell_id INT NOT NULL, nonPlayableCharacter_id INT NOT NULL, INDEX IDX_65F5F1B25F0644D5 (nonPlayableCharacter_id), INDEX IDX_65F5F1B2479EC90D (spell_id), PRIMARY KEY(nonPlayableCharacter_id, spell_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nonPlayableCharacters_items (item_id INT NOT NULL, nonPlayableCharacter_id INT NOT NULL, INDEX IDX_7B6320CD5F0644D5 (nonPlayableCharacter_id), INDEX IDX_7B6320CD126F525E (item_id), PRIMARY KEY(nonPlayableCharacter_id, item_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nonPlayableCharacters_skills (skill_id INT NOT NULL, nonPlayableCharacter_id INT NOT NULL, INDEX IDX_3813E8995F0644D5 (nonPlayableCharacter_id), INDEX IDX_3813E8995585C142 (skill_id), PRIMARY KEY(nonPlayableCharacter_id, skill_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells ADD CONSTRAINT FK_65F5F1B25F0644D5 FOREIGN KEY (nonPlayableCharacter_id) REFERENCES non_playable_character (id)');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells ADD CONSTRAINT FK_65F5F1B2479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items ADD CONSTRAINT FK_7B6320CD5F0644D5 FOREIGN KEY (nonPlayableCharacter_id) REFERENCES non_playable_character (id)');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items ADD CONSTRAINT FK_7B6320CD126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills ADD CONSTRAINT FK_3813E8995F0644D5 FOREIGN KEY (nonPlayableCharacter_id) REFERENCES non_playable_character (id)');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills ADD CONSTRAINT FK_3813E8995585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE armament ADD non_playable_character_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292E9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES monster (id)');
        $this->addSql('CREATE INDEX IDX_39EA292E9388FCC9 ON armament (non_playable_character_id)');
        $this->addSql('ALTER TABLE non_playable_character ADD game_id INT DEFAULT NULL, ADD first_name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD strength INT NOT NULL, ADD intelligence INT NOT NULL, ADD stamina INT NOT NULL, ADD agility INT NOT NULL, ADD charisma INT NOT NULL, ADD health_point INT NOT NULL, ADD mana INT NOT NULL');
        $this->addSql('ALTER TABLE non_playable_character ADD CONSTRAINT FK_A30778D1E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_A30778D1E48FD905 ON non_playable_character (game_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells DROP FOREIGN KEY FK_65F5F1B25F0644D5');
        $this->addSql('ALTER TABLE nonPlayableCharacters_spells DROP FOREIGN KEY FK_65F5F1B2479EC90D');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items DROP FOREIGN KEY FK_7B6320CD5F0644D5');
        $this->addSql('ALTER TABLE nonPlayableCharacters_items DROP FOREIGN KEY FK_7B6320CD126F525E');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills DROP FOREIGN KEY FK_3813E8995F0644D5');
        $this->addSql('ALTER TABLE nonPlayableCharacters_skills DROP FOREIGN KEY FK_3813E8995585C142');
        $this->addSql('DROP TABLE nonPlayableCharacters_spells');
        $this->addSql('DROP TABLE nonPlayableCharacters_items');
        $this->addSql('DROP TABLE nonPlayableCharacters_skills');
        $this->addSql('ALTER TABLE non_playable_character DROP FOREIGN KEY FK_A30778D1E48FD905');
        $this->addSql('DROP INDEX IDX_A30778D1E48FD905 ON non_playable_character');
        $this->addSql('ALTER TABLE non_playable_character DROP game_id, DROP first_name, DROP last_name, DROP title, DROP strength, DROP intelligence, DROP stamina, DROP agility, DROP charisma, DROP health_point, DROP mana');
        $this->addSql('ALTER TABLE armament DROP FOREIGN KEY FK_39EA292E9388FCC9');
        $this->addSql('DROP INDEX IDX_39EA292E9388FCC9 ON armament');
        $this->addSql('ALTER TABLE armament DROP non_playable_character_id');
    }
}
