<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250118203204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice CHANGE episode_id episode_id INT DEFAULT NULL, CHANGE effect_hp effect_hp INT NOT NULL, CHANGE effect_strength effect_strength INT NOT NULL, CHANGE effect_agility effect_agility INT NOT NULL, CHANGE effect_intelligence effect_intelligence INT NOT NULL, CHANGE effect_wisdom effect_wisdom INT NOT NULL');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A92362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDAAA5D4036 FOREIGN KEY (story_id) REFERENCES story (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice DROP FOREIGN KEY FK_C1AB5A92362B62A0');
        $this->addSql('ALTER TABLE choice CHANGE episode_id episode_id INT NOT NULL, CHANGE effect_hp effect_hp INT DEFAULT NULL, CHANGE effect_strength effect_strength INT DEFAULT NULL, CHANGE effect_agility effect_agility INT DEFAULT NULL, CHANGE effect_intelligence effect_intelligence INT DEFAULT NULL, CHANGE effect_wisdom effect_wisdom INT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDAAA5D4036');
        $this->addSql('ALTER TABLE user CHANGE roles roles VARCHAR(255) NOT NULL');
    }
}
