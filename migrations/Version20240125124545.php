<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125124545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, address_id INT NOT NULL, type_logement_id INT NOT NULL, prix INT NOT NULL, nombre_couchage INT NOT NULL, file_name VARCHAR(255) DEFAULT NULL, update_at DATE DEFAULT NULL, INDEX IDX_F65593E5A76ED395 (user_id), INDEX IDX_F65593E5F5B7AF75 (address_id), INDEX IDX_F65593E513B22EC4 (type_logement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce_equipement (annonce_id INT NOT NULL, equipement_id INT NOT NULL, INDEX IDX_A6C013708805AB2F (annonce_id), INDEX IDX_A6C01370806F0F5C (equipement_id), PRIMARY KEY(annonce_id, equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_logement (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E513B22EC4 FOREIGN KEY (type_logement_id) REFERENCES type_logement (id)');
        $this->addSql('ALTER TABLE annonce_equipement ADD CONSTRAINT FK_A6C013708805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_equipement ADD CONSTRAINT FK_A6C01370806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F5B7AF75');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E513B22EC4');
        $this->addSql('ALTER TABLE annonce_equipement DROP FOREIGN KEY FK_A6C013708805AB2F');
        $this->addSql('ALTER TABLE annonce_equipement DROP FOREIGN KEY FK_A6C01370806F0F5C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE annonce_equipement');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE type_logement');
        $this->addSql('DROP TABLE user');
    }
}
