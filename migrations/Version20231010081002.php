<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010081002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE user_id user_id INT DEFAULT NULL, CHANGE cv_id cv_id INT DEFAULT NULL, CHANGE photo_profil_id photo_profil_id INT DEFAULT NULL, CHANGE passeport_fichier_id passeport_fichier_id INT DEFAULT NULL, CHANGE date_creation date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE user_id user_id INT NOT NULL, CHANGE cv_id cv_id INT NOT NULL, CHANGE photo_profil_id photo_profil_id INT NOT NULL, CHANGE passeport_fichier_id passeport_fichier_id INT NOT NULL, CHANGE date_creation date_creation DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
