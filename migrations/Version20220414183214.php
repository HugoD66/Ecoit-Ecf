<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414183214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE study (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, document VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E67F97495200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE study ADD CONSTRAINT FK_E67F97495200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE formation ADD study_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFE7B003E9 FOREIGN KEY (study_id) REFERENCES study (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_404021BFE7B003E9 ON formation (study_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFE7B003E9');
        $this->addSql('DROP TABLE study');
        $this->addSql('DROP INDEX UNIQ_404021BFE7B003E9 ON formation');
        $this->addSql('ALTER TABLE formation DROP study_id');
    }
}
