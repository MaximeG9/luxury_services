<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011115613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_offre (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offre_emploi ADD type_offre_id INT NOT NULL, ADD date_fin DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D1813777A6 FOREIGN KEY (type_offre_id) REFERENCES type_offre (id)');
        $this->addSql('CREATE INDEX IDX_132AD0D1813777A6 ON offre_emploi (type_offre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_emploi DROP FOREIGN KEY FK_132AD0D1813777A6');
        $this->addSql('DROP TABLE type_offre');
        $this->addSql('DROP INDEX IDX_132AD0D1813777A6 ON offre_emploi');
        $this->addSql('ALTER TABLE offre_emploi DROP type_offre_id, DROP date_fin');
    }
}
