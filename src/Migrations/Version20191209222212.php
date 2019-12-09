<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209222212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etudiant CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe CHANGE professeur_id professeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification CHANGE source_etudiant_id source_etudiant_id INT DEFAULT NULL, CHANGE dest_etudiant_id dest_etudiant_id INT DEFAULT NULL, CHANGE source_groupe_id source_groupe_id INT DEFAULT NULL, CHANGE dest_groupe_id dest_groupe_id INT DEFAULT NULL, CHANGE source_professeur_id source_professeur_id INT DEFAULT NULL, CHANGE dest_professeur_id dest_professeur_id INT DEFAULT NULL, CHANGE nom_etudiant nom_etudiant VARCHAR(255) DEFAULT NULL, CHANGE nom_professeur nom_professeur VARCHAR(255) DEFAULT NULL, CHANGE nom_groupe nom_groupe VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tache CHANGE num_groupe num_groupe INT DEFAULT NULL, CHANGE nombre_sous_taches nombre_sous_taches INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD type VARCHAR(255) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etudiant CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user DROP type, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE groupe CHANGE professeur_id professeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification CHANGE source_etudiant_id source_etudiant_id INT DEFAULT NULL, CHANGE dest_etudiant_id dest_etudiant_id INT DEFAULT NULL, CHANGE source_professeur_id source_professeur_id INT DEFAULT NULL, CHANGE dest_professeur_id dest_professeur_id INT DEFAULT NULL, CHANGE source_groupe_id source_groupe_id INT DEFAULT NULL, CHANGE dest_groupe_id dest_groupe_id INT DEFAULT NULL, CHANGE nom_etudiant nom_etudiant VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_professeur nom_professeur VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_groupe nom_groupe VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE statut statut VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tache CHANGE num_groupe num_groupe INT DEFAULT NULL, CHANGE nombre_sous_taches nombre_sous_taches INT DEFAULT NULL');
    }
}
