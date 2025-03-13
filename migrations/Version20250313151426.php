<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250313151426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE playable_characters_kind (character_id INT NOT NULL, kind_id INT NOT NULL, PRIMARY KEY(character_id, kind_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_94787C3C1136BE75 ON playable_characters_kind (character_id)');
        $this->addSql('CREATE INDEX IDX_94787C3C30602CA9 ON playable_characters_kind (kind_id)');
        $this->addSql('CREATE TABLE playable_characters_character_class (character_id INT NOT NULL, character_class_id INT NOT NULL, PRIMARY KEY(character_id, character_class_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E06839101136BE75 ON playable_characters_character_class (character_id)');
        $this->addSql('CREATE INDEX IDX_E0683910B201E281 ON playable_characters_character_class (character_class_id)');
        $this->addSql('CREATE TABLE playable_characters_spells (character_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(character_id, spell_id))');
        $this->addSql('CREATE INDEX IDX_30BA65FE1136BE75 ON playable_characters_spells (character_id)');
        $this->addSql('CREATE INDEX IDX_30BA65FE479EC90D ON playable_characters_spells (spell_id)');
        $this->addSql('CREATE TABLE playable_characters_items (character_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(character_id, item_id))');
        $this->addSql('CREATE INDEX IDX_31D1437A1136BE75 ON playable_characters_items (character_id)');
        $this->addSql('CREATE INDEX IDX_31D1437A126F525E ON playable_characters_items (item_id)');
        $this->addSql('CREATE TABLE playable_characters_skills (character_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(character_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_6D5C7CD51136BE75 ON playable_characters_skills (character_id)');
        $this->addSql('CREATE INDEX IDX_6D5C7CD55585C142 ON playable_characters_skills (skill_id)');
        $this->addSql('CREATE TABLE playable_character_talent (character_id INT NOT NULL, talent_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(character_id, talent_id))');
        $this->addSql('CREATE INDEX IDX_443317B61136BE75 ON playable_character_talent (character_id)');
        $this->addSql('CREATE INDEX IDX_443317B618777CEF ON playable_character_talent (talent_id)');
        $this->addSql('ALTER TABLE playable_characters_kind ADD CONSTRAINT FK_94787C3C1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_kind ADD CONSTRAINT FK_94787C3C30602CA9 FOREIGN KEY (kind_id) REFERENCES kind (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_character_class ADD CONSTRAINT FK_E06839101136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_character_class ADD CONSTRAINT FK_E0683910B201E281 FOREIGN KEY (character_class_id) REFERENCES character_class (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_spells ADD CONSTRAINT FK_30BA65FE1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_spells ADD CONSTRAINT FK_30BA65FE479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_items ADD CONSTRAINT FK_31D1437A1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_items ADD CONSTRAINT FK_31D1437A126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_skills ADD CONSTRAINT FK_6D5C7CD51136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_skills ADD CONSTRAINT FK_6D5C7CD55585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_character_talent ADD CONSTRAINT FK_443317B61136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_character_talent ADD CONSTRAINT FK_443317B618777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_skills DROP CONSTRAINT fk_eb7e06d75585c142');
        $this->addSql('ALTER TABLE characters_skills DROP CONSTRAINT fk_eb7e06d71136be75');
        $this->addSql('ALTER TABLE character_talent DROP CONSTRAINT fk_b59bc1661136be75');
        $this->addSql('ALTER TABLE character_talent DROP CONSTRAINT fk_b59bc16618777cef');
        $this->addSql('ALTER TABLE characters_kind DROP CONSTRAINT fk_e84ceeed30602ca9');
        $this->addSql('ALTER TABLE characters_kind DROP CONSTRAINT fk_e84ceeed1136be75');
        $this->addSql('ALTER TABLE characters_character_class DROP CONSTRAINT fk_63c543beb201e281');
        $this->addSql('ALTER TABLE characters_character_class DROP CONSTRAINT fk_63c543be1136be75');
        $this->addSql('ALTER TABLE characters_spells DROP CONSTRAINT fk_b6981ffc479ec90d');
        $this->addSql('ALTER TABLE characters_spells DROP CONSTRAINT fk_b6981ffc1136be75');
        $this->addSql('ALTER TABLE characters_items DROP CONSTRAINT fk_c07995aa126f525e');
        $this->addSql('ALTER TABLE characters_items DROP CONSTRAINT fk_c07995aa1136be75');
        $this->addSql('DROP TABLE characters_skills');
        $this->addSql('DROP TABLE character_talent');
        $this->addSql('DROP TABLE characters_kind');
        $this->addSql('DROP TABLE characters_character_class');
        $this->addSql('DROP TABLE characters_spells');
        $this->addSql('DROP TABLE characters_items');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE characters_skills (character_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(character_id, skill_id))');
        $this->addSql('CREATE INDEX idx_eb7e06d75585c142 ON characters_skills (skill_id)');
        $this->addSql('CREATE INDEX idx_eb7e06d71136be75 ON characters_skills (character_id)');
        $this->addSql('CREATE TABLE character_talent (character_id INT NOT NULL, talent_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(character_id, talent_id))');
        $this->addSql('CREATE INDEX idx_b59bc16618777cef ON character_talent (talent_id)');
        $this->addSql('CREATE INDEX idx_b59bc1661136be75 ON character_talent (character_id)');
        $this->addSql('CREATE TABLE characters_kind (character_id INT NOT NULL, kind_id INT NOT NULL, PRIMARY KEY(character_id, kind_id))');
        $this->addSql('CREATE INDEX idx_e84ceeed30602ca9 ON characters_kind (kind_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_e84ceeed1136be75 ON characters_kind (character_id)');
        $this->addSql('CREATE TABLE characters_character_class (character_id INT NOT NULL, character_class_id INT NOT NULL, PRIMARY KEY(character_id, character_class_id))');
        $this->addSql('CREATE INDEX idx_63c543beb201e281 ON characters_character_class (character_class_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_63c543be1136be75 ON characters_character_class (character_id)');
        $this->addSql('CREATE TABLE characters_spells (character_id INT NOT NULL, spell_id INT NOT NULL, PRIMARY KEY(character_id, spell_id))');
        $this->addSql('CREATE INDEX idx_b6981ffc479ec90d ON characters_spells (spell_id)');
        $this->addSql('CREATE INDEX idx_b6981ffc1136be75 ON characters_spells (character_id)');
        $this->addSql('CREATE TABLE characters_items (character_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(character_id, item_id))');
        $this->addSql('CREATE INDEX idx_c07995aa126f525e ON characters_items (item_id)');
        $this->addSql('CREATE INDEX idx_c07995aa1136be75 ON characters_items (character_id)');
        $this->addSql('ALTER TABLE characters_skills ADD CONSTRAINT fk_eb7e06d75585c142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_skills ADD CONSTRAINT fk_eb7e06d71136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT fk_b59bc1661136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT fk_b59bc16618777cef FOREIGN KEY (talent_id) REFERENCES talent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_kind ADD CONSTRAINT fk_e84ceeed30602ca9 FOREIGN KEY (kind_id) REFERENCES kind (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_kind ADD CONSTRAINT fk_e84ceeed1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_character_class ADD CONSTRAINT fk_63c543beb201e281 FOREIGN KEY (character_class_id) REFERENCES character_class (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_character_class ADD CONSTRAINT fk_63c543be1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_spells ADD CONSTRAINT fk_b6981ffc479ec90d FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_spells ADD CONSTRAINT fk_b6981ffc1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_items ADD CONSTRAINT fk_c07995aa126f525e FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_items ADD CONSTRAINT fk_c07995aa1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playable_characters_kind DROP CONSTRAINT FK_94787C3C1136BE75');
        $this->addSql('ALTER TABLE playable_characters_kind DROP CONSTRAINT FK_94787C3C30602CA9');
        $this->addSql('ALTER TABLE playable_characters_character_class DROP CONSTRAINT FK_E06839101136BE75');
        $this->addSql('ALTER TABLE playable_characters_character_class DROP CONSTRAINT FK_E0683910B201E281');
        $this->addSql('ALTER TABLE playable_characters_spells DROP CONSTRAINT FK_30BA65FE1136BE75');
        $this->addSql('ALTER TABLE playable_characters_spells DROP CONSTRAINT FK_30BA65FE479EC90D');
        $this->addSql('ALTER TABLE playable_characters_items DROP CONSTRAINT FK_31D1437A1136BE75');
        $this->addSql('ALTER TABLE playable_characters_items DROP CONSTRAINT FK_31D1437A126F525E');
        $this->addSql('ALTER TABLE playable_characters_skills DROP CONSTRAINT FK_6D5C7CD51136BE75');
        $this->addSql('ALTER TABLE playable_characters_skills DROP CONSTRAINT FK_6D5C7CD55585C142');
        $this->addSql('ALTER TABLE playable_character_talent DROP CONSTRAINT FK_443317B61136BE75');
        $this->addSql('ALTER TABLE playable_character_talent DROP CONSTRAINT FK_443317B618777CEF');
        $this->addSql('DROP TABLE playable_characters_kind');
        $this->addSql('DROP TABLE playable_characters_character_class');
        $this->addSql('DROP TABLE playable_characters_spells');
        $this->addSql('DROP TABLE playable_characters_items');
        $this->addSql('DROP TABLE playable_characters_skills');
        $this->addSql('DROP TABLE playable_character_talent');
    }
}
