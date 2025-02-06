<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250206154928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, vehicule_cible_id INT NOT NULL, ecrit_par_id INT NOT NULL, contenu LONGTEXT NOT NULL, INDEX IDX_67F068BCE53CA522 (vehicule_cible_id), INDEX IDX_67F068BCAAF6E29 (ecrit_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, vehicule_reserve_id INT NOT NULL, reserve_par_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, prix_total DOUBLE PRECISION NOT NULL, INDEX IDX_42C8495550C3410 (vehicule_reserve_id), INDEX IDX_42C8495570E4F16E (reserve_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCE53CA522 FOREIGN KEY (vehicule_cible_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCAAF6E29 FOREIGN KEY (ecrit_par_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495550C3410 FOREIGN KEY (vehicule_reserve_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495570E4F16E FOREIGN KEY (reserve_par_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCE53CA522');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCAAF6E29');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495550C3410');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495570E4F16E');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE reservation');
    }
}
