<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920145950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, cv_id INT NOT NULL, photo_profil_id INT NOT NULL, passeport_fichier_id INT NOT NULL, genre VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, is_passeport TINYINT(1) NOT NULL, date_naissance DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', lieu_naissance VARCHAR(255) NOT NULL, disponibilte TINYINT(1) NOT NULL, job_categorie VARCHAR(255) NOT NULL, experience VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, note LONGTEXT NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_suppression DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', adresse VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6AB5B471A76ED395 (user_id), UNIQUE INDEX UNIQ_6AB5B471CFE419E2 (cv_id), UNIQUE INDEX UNIQ_6AB5B4712AA08659 (photo_profil_id), UNIQUE INDEX UNIQ_6AB5B471D0DD9C0 (passeport_fichier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, offre_emploi_id INT NOT NULL, INDEX IDX_E33BD3B88D0EB82 (candidat_id), INDEX IDX_E33BD3B8B08996ED (offre_emploi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_societe VARCHAR(255) NOT NULL, activite VARCHAR(255) NOT NULL, nom_contact VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, tel_contact INT NOT NULL, mail_contact VARCHAR(255) NOT NULL, note INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_emploi (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, statut INT NOT NULL, reference VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, activation TINYINT(1) NOT NULL, note INT NOT NULL, titre_offre VARCHAR(255) NOT NULL, type_offre INT NOT NULL, location VARCHAR(255) NOT NULL, job_categorie VARCHAR(255) NOT NULL, salaire INT NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_132AD0D119EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471CFE419E2 FOREIGN KEY (cv_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4712AA08659 FOREIGN KEY (photo_profil_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471D0DD9C0 FOREIGN KEY (passeport_fichier_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B88D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8B08996ED FOREIGN KEY (offre_emploi_id) REFERENCES offre_emploi (id)');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D119EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471CFE419E2');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4712AA08659');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471D0DD9C0');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B88D0EB82');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8B08996ED');
        $this->addSql('ALTER TABLE offre_emploi DROP FOREIGN KEY FK_132AD0D119EB6921');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE offre_emploi');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
