<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108202624 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCCA9E2D76C');
        $this->addSql('DROP TABLE TCLIENT');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE etudiant ADD num_etudiant INT NOT NULL, CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe CHANGE professeur_id professeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taches CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification CHANGE source_etudiant_id source_etudiant_id INT DEFAULT NULL, CHANGE dest_etudiant_id dest_etudiant_id INT DEFAULT NULL, CHANGE source_groupe_id source_groupe_id INT DEFAULT NULL, CHANGE dest_groupe_id dest_groupe_id INT DEFAULT NULL, CHANGE source_professeur_id source_professeur_id INT DEFAULT NULL, CHANGE dest_professeur_id dest_professeur_id INT DEFAULT NULL, CHANGE nom_etudiant nom_etudiant VARCHAR(255) DEFAULT NULL, CHANGE nom_professeur nom_professeur VARCHAR(255) DEFAULT NULL, CHANGE nom_groupe nom_groupe VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE TCLIENT (IdClient INT NOT NULL, Nom VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci, TauxRemise NUMERIC(5, 2) DEFAULT \'NULL\', PRIMARY KEY(IdClient)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE coach (id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, age VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, nationalite VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_3F596DCCA9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, classement_atp INT NOT NULL, age INT NOT NULL, nationalite VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, poids INT NOT NULL, taille INT NOT NULL, image VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personne (nom VARCHAR(250) NOT NULL COLLATE latin1_swedish_ci, prenom VARCHAR(250) NOT NULL COLLATE latin1_swedish_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, num_groupe INT DEFAULT NULL, nom_tache VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, desc_tache LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, tache_realisee TINYINT(1) NOT NULL, nombre_sous_taches INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, username VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCCA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE etudiant DROP num_etudiant, CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE groupe CHANGE professeur_id professeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification CHANGE source_etudiant_id source_etudiant_id INT DEFAULT NULL, CHANGE dest_etudiant_id dest_etudiant_id INT DEFAULT NULL, CHANGE source_professeur_id source_professeur_id INT DEFAULT NULL, CHANGE dest_professeur_id dest_professeur_id INT DEFAULT NULL, CHANGE source_groupe_id source_groupe_id INT DEFAULT NULL, CHANGE dest_groupe_id dest_groupe_id INT DEFAULT NULL, CHANGE nom_etudiant nom_etudiant VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_professeur nom_professeur VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_groupe nom_groupe VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE statut statut VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE taches CHANGE groupe_id groupe_id INT DEFAULT NULL');
    }
}
