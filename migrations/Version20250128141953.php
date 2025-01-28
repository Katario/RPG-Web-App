<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250128141953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, username VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('CREATE TABLE armament (id SERIAL NOT NULL, game_id INT DEFAULT NULL, monster_id INT DEFAULT NULL, non_playable_character_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, value INT NOT NULL, durability INT NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_39EA292EE48FD905 ON armament (game_id)');
        $this->addSql('CREATE INDEX IDX_39EA292EC5FF1223 ON armament (monster_id)');
        $this->addSql('CREATE INDEX IDX_39EA292E9388FCC9 ON armament (non_playable_character_id)');
        $this->addSql('CREATE TABLE armaments_skills (armament_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(armament_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_5BA489AF500B3A6E ON armaments_skills (armament_id)');
        $this->addSql('CREATE INDEX IDX_5BA489AF5585C142 ON armaments_skills (skill_id)');
        $this->addSql('CREATE TABLE armaments_spells (armament_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(armament_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_6429084500B3A6E ON armaments_spells (armament_id)');
        $this->addSql('CREATE INDEX IDX_6429084479EC90D ON armaments_spells (spell_id)');
        $this->addSql('CREATE TABLE game (id SERIAL NOT NULL, game_master INT DEFAULT NULL, name VARCHAR(255) NOT NULL, ruleset VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_232B318C503C0E1E ON game (game_master)');
        $this->addSql('CREATE TABLE item (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, cost VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mastery (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE monster (id SERIAL NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, strength INT NOT NULL, intelligence INT NOT NULL, stamina INT NOT NULL, agility INT NOT NULL, charisma INT NOT NULL, health_point INT NOT NULL, mana INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_245EC6F4E48FD905 ON monster (game_id)');
        $this->addSql('CREATE TABLE monsters_spells (monster_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(monster_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_7D5C2EFEC5FF1223 ON monsters_spells (monster_id)');
        $this->addSql('CREATE INDEX IDX_7D5C2EFE479EC90D ON monsters_spells (spell_id)');
        $this->addSql('CREATE TABLE monsters_items (monster_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(monster_id, item_id))');
        $this->addSql('CREATE INDEX IDX_65FB1B1AC5FF1223 ON monsters_items (monster_id)');
        $this->addSql('CREATE INDEX IDX_65FB1B1A126F525E ON monsters_items (item_id)');
        $this->addSql('CREATE TABLE monsters_skills (monster_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(monster_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_20BA37D5C5FF1223 ON monsters_skills (monster_id)');
        $this->addSql('CREATE INDEX IDX_20BA37D55585C142 ON monsters_skills (skill_id)');
        $this->addSql('CREATE TABLE non_playable_character (id SERIAL NOT NULL, game_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, strength INT NOT NULL, intelligence INT NOT NULL, stamina INT NOT NULL, agility INT NOT NULL, charisma INT NOT NULL, health_point INT NOT NULL, mana INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A30778D1E48FD905 ON non_playable_character (game_id)');
        $this->addSql('CREATE TABLE non_playable_characters_spells (non_playable_character_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(non_playable_character_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_94C7438C9388FCC9 ON non_playable_characters_spells (non_playable_character_id)');
        $this->addSql('CREATE INDEX IDX_94C7438C479EC90D ON non_playable_characters_spells (spell_id)');
        $this->addSql('CREATE TABLE non_playable_characters_items (non_playable_character_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(non_playable_character_id, item_id))');
        $this->addSql('CREATE INDEX IDX_9D335C1C9388FCC9 ON non_playable_characters_items (non_playable_character_id)');
        $this->addSql('CREATE INDEX IDX_9D335C1C126F525E ON non_playable_characters_items (item_id)');
        $this->addSql('CREATE TABLE non_playable_characters_skills (non_playable_character_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(non_playable_character_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_C9215AA79388FCC9 ON non_playable_characters_skills (non_playable_character_id)');
        $this->addSql('CREATE INDEX IDX_C9215AA75585C142 ON non_playable_characters_skills (skill_id)');
        $this->addSql('CREATE TABLE playable_character (id SERIAL NOT NULL, user_id INT DEFAULT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, current_level INT NOT NULL, health_points INT NOT NULL, max_health_points INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E143D669A76ED395 ON playable_character (user_id)');
        $this->addSql('CREATE INDEX IDX_E143D669E48FD905 ON playable_character (game_id)');
        $this->addSql('CREATE TABLE skill (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, mana_cost INT DEFAULT NULL, physical_cost INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE spell (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, mana_cost INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE talent (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292EE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292EC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armament ADD CONSTRAINT FK_39EA292E9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_skills ADD CONSTRAINT FK_5BA489AF500B3A6E FOREIGN KEY (armament_id) REFERENCES armament (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_skills ADD CONSTRAINT FK_5BA489AF5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_spells ADD CONSTRAINT FK_6429084500B3A6E FOREIGN KEY (armament_id) REFERENCES armament (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_spells ADD CONSTRAINT FK_6429084479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C503C0E1E FOREIGN KEY (game_master) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_spells ADD CONSTRAINT FK_7D5C2EFEC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_spells ADD CONSTRAINT FK_7D5C2EFE479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_items ADD CONSTRAINT FK_65FB1B1AC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_items ADD CONSTRAINT FK_65FB1B1A126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_skills ADD CONSTRAINT FK_20BA37D5C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_skills ADD CONSTRAINT FK_20BA37D55585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character ADD CONSTRAINT FK_A30778D1E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_spells ADD CONSTRAINT FK_94C7438C9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_spells ADD CONSTRAINT FK_94C7438C479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_items ADD CONSTRAINT FK_9D335C1C9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_items ADD CONSTRAINT FK_9D335C1C126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_skills ADD CONSTRAINT FK_C9215AA79388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_skills ADD CONSTRAINT FK_C9215AA75585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_character ADD CONSTRAINT FK_E143D669A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_character ADD CONSTRAINT FK_E143D669E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE armament DROP CONSTRAINT FK_39EA292EE48FD905');
        $this->addSql('ALTER TABLE armament DROP CONSTRAINT FK_39EA292EC5FF1223');
        $this->addSql('ALTER TABLE armament DROP CONSTRAINT FK_39EA292E9388FCC9');
        $this->addSql('ALTER TABLE armaments_skills DROP CONSTRAINT FK_5BA489AF500B3A6E');
        $this->addSql('ALTER TABLE armaments_skills DROP CONSTRAINT FK_5BA489AF5585C142');
        $this->addSql('ALTER TABLE armaments_spells DROP CONSTRAINT FK_6429084500B3A6E');
        $this->addSql('ALTER TABLE armaments_spells DROP CONSTRAINT FK_6429084479EC90D');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318C503C0E1E');
        $this->addSql('ALTER TABLE monster DROP CONSTRAINT FK_245EC6F4E48FD905');
        $this->addSql('ALTER TABLE monsters_spells DROP CONSTRAINT FK_7D5C2EFEC5FF1223');
        $this->addSql('ALTER TABLE monsters_spells DROP CONSTRAINT FK_7D5C2EFE479EC90D');
        $this->addSql('ALTER TABLE monsters_items DROP CONSTRAINT FK_65FB1B1AC5FF1223');
        $this->addSql('ALTER TABLE monsters_items DROP CONSTRAINT FK_65FB1B1A126F525E');
        $this->addSql('ALTER TABLE monsters_skills DROP CONSTRAINT FK_20BA37D5C5FF1223');
        $this->addSql('ALTER TABLE monsters_skills DROP CONSTRAINT FK_20BA37D55585C142');
        $this->addSql('ALTER TABLE non_playable_character DROP CONSTRAINT FK_A30778D1E48FD905');
        $this->addSql('ALTER TABLE non_playable_characters_spells DROP CONSTRAINT FK_94C7438C9388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_spells DROP CONSTRAINT FK_94C7438C479EC90D');
        $this->addSql('ALTER TABLE non_playable_characters_items DROP CONSTRAINT FK_9D335C1C9388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_items DROP CONSTRAINT FK_9D335C1C126F525E');
        $this->addSql('ALTER TABLE non_playable_characters_skills DROP CONSTRAINT FK_C9215AA79388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_skills DROP CONSTRAINT FK_C9215AA75585C142');
        $this->addSql('ALTER TABLE playable_character DROP CONSTRAINT FK_E143D669A76ED395');
        $this->addSql('ALTER TABLE playable_character DROP CONSTRAINT FK_E143D669E48FD905');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE armament');
        $this->addSql('DROP TABLE armaments_skills');
        $this->addSql('DROP TABLE armaments_spells');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE mastery');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE monsters_spells');
        $this->addSql('DROP TABLE monsters_items');
        $this->addSql('DROP TABLE monsters_skills');
        $this->addSql('DROP TABLE non_playable_character');
        $this->addSql('DROP TABLE non_playable_characters_spells');
        $this->addSql('DROP TABLE non_playable_characters_items');
        $this->addSql('DROP TABLE non_playable_characters_skills');
        $this->addSql('DROP TABLE playable_character');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE talent');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
