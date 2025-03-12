<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312143605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armaments_skills DROP CONSTRAINT FK_5BA489AF500B3A6E');
        $this->addSql('ALTER TABLE armaments_skills ADD CONSTRAINT FK_5BA489AF500B3A6E FOREIGN KEY (armament_id) REFERENCES armament (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_spells DROP CONSTRAINT FK_6429084500B3A6E');
        $this->addSql('ALTER TABLE armaments_spells ADD CONSTRAINT FK_6429084500B3A6E FOREIGN KEY (armament_id) REFERENCES armament (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_specie DROP CONSTRAINT FK_FFA328D7C5FF1223');
        $this->addSql('ALTER TABLE monsters_specie ADD CONSTRAINT FK_FFA328D7C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_spells DROP CONSTRAINT FK_7D5C2EFEC5FF1223');
        $this->addSql('ALTER TABLE monsters_spells ADD CONSTRAINT FK_7D5C2EFEC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_items DROP CONSTRAINT FK_65FB1B1AC5FF1223');
        $this->addSql('ALTER TABLE monsters_items ADD CONSTRAINT FK_65FB1B1AC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_skills DROP CONSTRAINT FK_20BA37D5C5FF1223');
        $this->addSql('ALTER TABLE monsters_skills ADD CONSTRAINT FK_20BA37D5C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_kind DROP CONSTRAINT FK_CA9E5A179388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_kind ADD CONSTRAINT FK_CA9E5A179388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_character_class DROP CONSTRAINT FK_E165B819388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_character_class ADD CONSTRAINT FK_E165B819388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_spells DROP CONSTRAINT FK_94C7438C9388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_spells ADD CONSTRAINT FK_94C7438C9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_items DROP CONSTRAINT FK_9D335C1C9388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_items ADD CONSTRAINT FK_9D335C1C9388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_skills DROP CONSTRAINT FK_C9215AA79388FCC9');
        $this->addSql('ALTER TABLE non_playable_characters_skills ADD CONSTRAINT FK_C9215AA79388FCC9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_kind DROP CONSTRAINT FK_E84CEEED1136BE75');
        $this->addSql('ALTER TABLE characters_kind ADD CONSTRAINT FK_E84CEEED1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_character_class DROP CONSTRAINT FK_63C543BE1136BE75');
        $this->addSql('ALTER TABLE characters_character_class ADD CONSTRAINT FK_63C543BE1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_spells DROP CONSTRAINT FK_B6981FFC1136BE75');
        $this->addSql('ALTER TABLE characters_spells ADD CONSTRAINT FK_B6981FFC1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_items DROP CONSTRAINT FK_C07995AA1136BE75');
        $this->addSql('ALTER TABLE characters_items ADD CONSTRAINT FK_C07995AA1136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_skills DROP CONSTRAINT FK_EB7E06D71136BE75');
        $this->addSql('ALTER TABLE characters_skills ADD CONSTRAINT FK_EB7E06D71136BE75 FOREIGN KEY (character_id) REFERENCES playable_character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE characters_items DROP CONSTRAINT fk_c07995aa1136be75');
        $this->addSql('ALTER TABLE characters_items ADD CONSTRAINT fk_c07995aa1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_spells DROP CONSTRAINT fk_b6981ffc1136be75');
        $this->addSql('ALTER TABLE characters_spells ADD CONSTRAINT fk_b6981ffc1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_character_class DROP CONSTRAINT fk_63c543be1136be75');
        $this->addSql('ALTER TABLE characters_character_class ADD CONSTRAINT fk_63c543be1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_kind DROP CONSTRAINT fk_e84ceeed1136be75');
        $this->addSql('ALTER TABLE characters_kind ADD CONSTRAINT fk_e84ceeed1136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characters_skills DROP CONSTRAINT fk_eb7e06d71136be75');
        $this->addSql('ALTER TABLE characters_skills ADD CONSTRAINT fk_eb7e06d71136be75 FOREIGN KEY (character_id) REFERENCES playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_skills DROP CONSTRAINT fk_c9215aa79388fcc9');
        $this->addSql('ALTER TABLE non_playable_characters_skills ADD CONSTRAINT fk_c9215aa79388fcc9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_items DROP CONSTRAINT fk_9d335c1c9388fcc9');
        $this->addSql('ALTER TABLE non_playable_characters_items ADD CONSTRAINT fk_9d335c1c9388fcc9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_spells DROP CONSTRAINT fk_94c7438c9388fcc9');
        $this->addSql('ALTER TABLE non_playable_characters_spells ADD CONSTRAINT fk_94c7438c9388fcc9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_character_class DROP CONSTRAINT fk_e165b819388fcc9');
        $this->addSql('ALTER TABLE non_playable_characters_character_class ADD CONSTRAINT fk_e165b819388fcc9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_characters_kind DROP CONSTRAINT fk_ca9e5a179388fcc9');
        $this->addSql('ALTER TABLE non_playable_characters_kind ADD CONSTRAINT fk_ca9e5a179388fcc9 FOREIGN KEY (non_playable_character_id) REFERENCES non_playable_character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_skills DROP CONSTRAINT fk_5ba489af500b3a6e');
        $this->addSql('ALTER TABLE armaments_skills ADD CONSTRAINT fk_5ba489af500b3a6e FOREIGN KEY (armament_id) REFERENCES armament (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_skills DROP CONSTRAINT fk_20ba37d5c5ff1223');
        $this->addSql('ALTER TABLE monsters_skills ADD CONSTRAINT fk_20ba37d5c5ff1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_items DROP CONSTRAINT fk_65fb1b1ac5ff1223');
        $this->addSql('ALTER TABLE monsters_items ADD CONSTRAINT fk_65fb1b1ac5ff1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armaments_spells DROP CONSTRAINT fk_6429084500b3a6e');
        $this->addSql('ALTER TABLE armaments_spells ADD CONSTRAINT fk_6429084500b3a6e FOREIGN KEY (armament_id) REFERENCES armament (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_spells DROP CONSTRAINT fk_7d5c2efec5ff1223');
        $this->addSql('ALTER TABLE monsters_spells ADD CONSTRAINT fk_7d5c2efec5ff1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monsters_specie DROP CONSTRAINT fk_ffa328d7c5ff1223');
        $this->addSql('ALTER TABLE monsters_specie ADD CONSTRAINT fk_ffa328d7c5ff1223 FOREIGN KEY (monster_id) REFERENCES monster (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
