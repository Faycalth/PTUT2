<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191105192207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, source_etudiant_id INT DEFAULT NULL, dest_etudiant_id INT DEFAULT NULL, source_groupe_id INT DEFAULT NULL, dest_groupe_id INT DEFAULT NULL, nom_source_etudiant VARCHAR(255) DEFAULT NULL, nom_dest_etudiant VARCHAR(255) DEFAULT NULL, nom_groupe VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, statut VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_BF5476CAE195E103 (source_etudiant_id), INDEX IDX_BF5476CA64B33483 (dest_etudiant_id), INDEX IDX_BF5476CA12DBA642 (source_groupe_id), INDEX IDX_BF5476CA9E6A9E2A (dest_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAE195E103 FOREIGN KEY (source_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA64B33483 FOREIGN KEY (dest_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA12DBA642 FOREIGN KEY (source_groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA9E6A9E2A FOREIGN KEY (dest_groupe_id) REFERENCES groupe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

       // $this->addSql('DROP TABLE notification');
    }
}
