<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003092710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE genre genre VARCHAR(255) DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE nationalite nationalite VARCHAR(255) DEFAULT NULL, CHANGE is_passeport is_passeport TINYINT(1) DEFAULT NULL, CHANGE date_naissance date_naissance DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE lieu_naissance lieu_naissance VARCHAR(255) DEFAULT NULL, CHANGE disponibilte disponibilte TINYINT(1) DEFAULT NULL, CHANGE experience experience VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE note note LONGTEXT DEFAULT NULL, CHANGE date_creation date_creation DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_suppression date_suppression DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE genre genre VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nationalite nationalite VARCHAR(255) NOT NULL, CHANGE is_passeport is_passeport TINYINT(1) NOT NULL, CHANGE date_naissance date_naissance DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE lieu_naissance lieu_naissance VARCHAR(255) NOT NULL, CHANGE disponibilte disponibilte TINYINT(1) NOT NULL, CHANGE experience experience VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE note note LONGTEXT NOT NULL, CHANGE date_creation date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_suppression date_suppression DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE pays pays VARCHAR(255) NOT NULL');
    }
}
