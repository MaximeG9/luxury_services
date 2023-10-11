<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002092211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat ADD job_categorie_id INT DEFAULT NULL, DROP job_categorie');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471B3967202 FOREIGN KEY (job_categorie_id) REFERENCES job_categorie (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B471B3967202 ON candidat (job_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471B3967202');
        $this->addSql('DROP INDEX IDX_6AB5B471B3967202 ON candidat');
        $this->addSql('ALTER TABLE candidat ADD job_categorie VARCHAR(255) NOT NULL, DROP job_categorie_id');
    }
}
