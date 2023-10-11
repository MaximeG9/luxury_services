<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926113737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offre_emploi ADD job_categorie_id INT NOT NULL, DROP job_categorie, CHANGE note note VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D1B3967202 FOREIGN KEY (job_categorie_id) REFERENCES job_categorie (id)');
        $this->addSql('CREATE INDEX IDX_132AD0D1B3967202 ON offre_emploi (job_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_emploi DROP FOREIGN KEY FK_132AD0D1B3967202');
        $this->addSql('DROP TABLE job_categorie');
        $this->addSql('DROP INDEX IDX_132AD0D1B3967202 ON offre_emploi');
        $this->addSql('ALTER TABLE offre_emploi ADD job_categorie VARCHAR(255) NOT NULL, DROP job_categorie_id, CHANGE note note INT NOT NULL');
    }
}
