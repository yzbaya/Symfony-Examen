<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525094355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom LONGTEXT NOT NULL, mail LONGTEXT NOT NULL, password LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tache ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_93872075FB88E14F ON tache (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075FB88E14F');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX IDX_93872075FB88E14F ON tache');
        $this->addSql('ALTER TABLE tache DROP utilisateur_id');
    }
}
