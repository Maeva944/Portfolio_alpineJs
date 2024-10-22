<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241016092653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE realisation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE realisation (id INT NOT NULL, id_categorie_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(600) NOT NULL, image VARCHAR(255) NOT NULL, lien_github VARCHAR(255) NOT NULL, techno_use VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EAA5610E9F34925F ON realisation (id_categorie_id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610E9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE realisation_id_seq CASCADE');
        $this->addSql('ALTER TABLE realisation DROP CONSTRAINT FK_EAA5610E9F34925F');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE realisation');
    }
}
