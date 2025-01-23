<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250123133607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armament (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, value INT NOT NULL, durability INT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armaments_skills (armament_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_5BA489AF500B3A6E (armament_id), INDEX IDX_5BA489AF5585C142 (skill_id), PRIMARY KEY(armament_id, skill_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armaments_spells (armament_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_6429084500B3A6E (armament_id), INDEX IDX_6429084479EC90D (spell_id), PRIMARY KEY(armament_id, spell_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, cost VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mastery (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, armaments_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, strength INT NOT NULL, intelligence INT NOT NULL, stamina INT NOT NULL, agility INT NOT NULL, charisma INT NOT NULL, health_point INT NOT NULL, mana INT NOT NULL, INDEX IDX_245EC6F44D2BFA40 (armaments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monsters_spells (monster_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_7D5C2EFEC5FF1223 (monster_id), INDEX IDX_7D5C2EFE479EC90D (spell_id), PRIMARY KEY(monster_id, spell_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monsters_items (monster_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_65FB1B1AC5FF1223 (monster_id), INDEX IDX_65FB1B1A126F525E (item_id), PRIMARY KEY(monster_id, item_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monsters_skills (monster_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_20BA37D5C5FF1223 (monster_id), INDEX IDX_20BA37D55585C142 (skill_id), PRIMARY KEY(monster_id, skill_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_playable_character (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, mana_cost INT DEFAULT NULL, physical_cost INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, mana_cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE armaments_skills ADD CONSTRAINT FK_5BA489AF500B3A6E FOREIGN KEY (armament_id) REFERENCES armament (id)');
        $this->addSql('ALTER TABLE armaments_skills ADD CONSTRAINT FK_5BA489AF5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE armaments_spells ADD CONSTRAINT FK_6429084500B3A6E FOREIGN KEY (armament_id) REFERENCES armament (id)');
        $this->addSql('ALTER TABLE armaments_spells ADD CONSTRAINT FK_6429084479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F44D2BFA40 FOREIGN KEY (armaments_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE monsters_spells ADD CONSTRAINT FK_7D5C2EFEC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE monsters_spells ADD CONSTRAINT FK_7D5C2EFE479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
        $this->addSql('ALTER TABLE monsters_items ADD CONSTRAINT FK_65FB1B1AC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE monsters_items ADD CONSTRAINT FK_65FB1B1A126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE monsters_skills ADD CONSTRAINT FK_20BA37D5C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE monsters_skills ADD CONSTRAINT FK_20BA37D55585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('DROP TABLE stuff');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stuff (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, value INT NOT NULL, durability INT NOT NULL, max_durability INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE armaments_skills DROP FOREIGN KEY FK_5BA489AF500B3A6E');
        $this->addSql('ALTER TABLE armaments_skills DROP FOREIGN KEY FK_5BA489AF5585C142');
        $this->addSql('ALTER TABLE armaments_spells DROP FOREIGN KEY FK_6429084500B3A6E');
        $this->addSql('ALTER TABLE armaments_spells DROP FOREIGN KEY FK_6429084479EC90D');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F44D2BFA40');
        $this->addSql('ALTER TABLE monsters_spells DROP FOREIGN KEY FK_7D5C2EFEC5FF1223');
        $this->addSql('ALTER TABLE monsters_spells DROP FOREIGN KEY FK_7D5C2EFE479EC90D');
        $this->addSql('ALTER TABLE monsters_items DROP FOREIGN KEY FK_65FB1B1AC5FF1223');
        $this->addSql('ALTER TABLE monsters_items DROP FOREIGN KEY FK_65FB1B1A126F525E');
        $this->addSql('ALTER TABLE monsters_skills DROP FOREIGN KEY FK_20BA37D5C5FF1223');
        $this->addSql('ALTER TABLE monsters_skills DROP FOREIGN KEY FK_20BA37D55585C142');
        $this->addSql('DROP TABLE armament');
        $this->addSql('DROP TABLE armaments_skills');
        $this->addSql('DROP TABLE armaments_spells');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE mastery');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE monsters_spells');
        $this->addSql('DROP TABLE monsters_items');
        $this->addSql('DROP TABLE monsters_skills');
        $this->addSql('DROP TABLE non_playable_character');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE talent');
    }
}
