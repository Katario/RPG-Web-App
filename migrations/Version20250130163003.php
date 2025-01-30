<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130163003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_templates_spells DROP CONSTRAINT FK_3AA8E4FC1B0A514');
        $this->addSql('ALTER TABLE character_templates_spells DROP CONSTRAINT FK_3AA8E4FC479EC90D');
        $this->addSql('ALTER TABLE character_templates_spells ADD CONSTRAINT FK_3AA8E4FC1B0A514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_spells ADD CONSTRAINT FK_3AA8E4FC479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_items DROP CONSTRAINT FK_23FE66F41B0A514');
        $this->addSql('ALTER TABLE character_templates_items DROP CONSTRAINT FK_23FE66F4126F525E');
        $this->addSql('ALTER TABLE character_templates_items ADD CONSTRAINT FK_23FE66F41B0A514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_items ADD CONSTRAINT FK_23FE66F4126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_skills DROP CONSTRAINT FK_674EFDD71B0A514');
        $this->addSql('ALTER TABLE character_templates_skills DROP CONSTRAINT FK_674EFDD75585C142');
        $this->addSql('ALTER TABLE character_templates_skills ADD CONSTRAINT FK_674EFDD71B0A514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_skills ADD CONSTRAINT FK_674EFDD75585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_spells DROP CONSTRAINT FK_1E44CA762D30EB4A');
        $this->addSql('ALTER TABLE monster_templates_spells DROP CONSTRAINT FK_1E44CA76479EC90D');
        $this->addSql('ALTER TABLE monster_templates_spells ADD CONSTRAINT FK_1E44CA762D30EB4A FOREIGN KEY (monster_template_id) REFERENCES monster_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_spells ADD CONSTRAINT FK_1E44CA76479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_items DROP CONSTRAINT FK_7B734A0718774676');
        $this->addSql('ALTER TABLE monster_templates_items ADD CONSTRAINT FK_7B734A0718774676 FOREIGN KEY (monste_templater_id) REFERENCES monster_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_skills DROP CONSTRAINT FK_43A2D35D2D30EB4A');
        $this->addSql('ALTER TABLE monster_templates_skills DROP CONSTRAINT FK_43A2D35D5585C142');
        $this->addSql('ALTER TABLE monster_templates_skills ADD CONSTRAINT FK_43A2D35D2D30EB4A FOREIGN KEY (monster_template_id) REFERENCES monster_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_skills ADD CONSTRAINT FK_43A2D35D5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells DROP CONSTRAINT FK_577BFCC3479EC90D');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells DROP CONSTRAINT FK_577BFCC3E76AD223');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells ADD CONSTRAINT FK_577BFCC3479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells ADD CONSTRAINT FK_577BFCC3E76AD223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_items DROP CONSTRAINT FK_2D02B2E1E76AD223');
        $this->addSql('ALTER TABLE non_playable_character_templates_items ADD CONSTRAINT FK_2D02B2E1E76AD223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills DROP CONSTRAINT FK_A9DE5E8E76AD223');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills DROP CONSTRAINT FK_A9DE5E85585C142');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills ADD CONSTRAINT FK_A9DE5E8E76AD223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills ADD CONSTRAINT FK_A9DE5E85585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_templates_spells DROP CONSTRAINT fk_3aa8e4fc1b0a514');
        $this->addSql('ALTER TABLE character_templates_spells DROP CONSTRAINT fk_3aa8e4fc479ec90d');
        $this->addSql('ALTER TABLE character_templates_spells ADD CONSTRAINT fk_3aa8e4fc1b0a514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_spells ADD CONSTRAINT fk_3aa8e4fc479ec90d FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_items DROP CONSTRAINT fk_7b734a0718774676');
        $this->addSql('ALTER TABLE monster_templates_items ADD CONSTRAINT fk_7b734a0718774676 FOREIGN KEY (monste_templater_id) REFERENCES monster_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_skills DROP CONSTRAINT fk_43a2d35d2d30eb4a');
        $this->addSql('ALTER TABLE monster_templates_skills DROP CONSTRAINT fk_43a2d35d5585c142');
        $this->addSql('ALTER TABLE monster_templates_skills ADD CONSTRAINT fk_43a2d35d2d30eb4a FOREIGN KEY (monster_template_id) REFERENCES monster_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_skills ADD CONSTRAINT fk_43a2d35d5585c142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills DROP CONSTRAINT fk_a9de5e8e76ad223');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills DROP CONSTRAINT fk_a9de5e85585c142');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills ADD CONSTRAINT fk_a9de5e8e76ad223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_skills ADD CONSTRAINT fk_a9de5e85585c142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_items DROP CONSTRAINT fk_2d02b2e1e76ad223');
        $this->addSql('ALTER TABLE non_playable_character_templates_items ADD CONSTRAINT fk_2d02b2e1e76ad223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells DROP CONSTRAINT fk_577bfcc3e76ad223');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells DROP CONSTRAINT fk_577bfcc3479ec90d');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells ADD CONSTRAINT fk_577bfcc3e76ad223 FOREIGN KEY (non_playable_character_template_id) REFERENCES non_playable_character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE non_playable_character_templates_spells ADD CONSTRAINT fk_577bfcc3479ec90d FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_items DROP CONSTRAINT fk_23fe66f41b0a514');
        $this->addSql('ALTER TABLE character_templates_items DROP CONSTRAINT fk_23fe66f4126f525e');
        $this->addSql('ALTER TABLE character_templates_items ADD CONSTRAINT fk_23fe66f41b0a514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_items ADD CONSTRAINT fk_23fe66f4126f525e FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_skills DROP CONSTRAINT fk_674efdd71b0a514');
        $this->addSql('ALTER TABLE character_templates_skills DROP CONSTRAINT fk_674efdd75585c142');
        $this->addSql('ALTER TABLE character_templates_skills ADD CONSTRAINT fk_674efdd71b0a514 FOREIGN KEY (character_template_id) REFERENCES character_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_templates_skills ADD CONSTRAINT fk_674efdd75585c142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_spells DROP CONSTRAINT fk_1e44ca762d30eb4a');
        $this->addSql('ALTER TABLE monster_templates_spells DROP CONSTRAINT fk_1e44ca76479ec90d');
        $this->addSql('ALTER TABLE monster_templates_spells ADD CONSTRAINT fk_1e44ca762d30eb4a FOREIGN KEY (monster_template_id) REFERENCES monster_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE monster_templates_spells ADD CONSTRAINT fk_1e44ca76479ec90d FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
