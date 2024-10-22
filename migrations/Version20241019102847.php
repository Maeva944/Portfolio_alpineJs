<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241019102847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE certification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE certification (id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(400) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE categorie ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE realisation DROP CONSTRAINT fk_eaa5610ebcf5e72d');
        $this->addSql('DROP INDEX idx_eaa5610ebcf5e72d');
        $this->addSql('ALTER TABLE realisation ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE realisation ALTER description TYPE VARCHAR(600)');
        $this->addSql('ALTER TABLE realisation RENAME COLUMN categorie_id TO id_categorie_id');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610E9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_EAA5610E9F34925F ON realisation (id_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE certification_id_seq CASCADE');
        $this->addSql('DROP TABLE certification');
        $this->addSql('ALTER TABLE realisation DROP CONSTRAINT FK_EAA5610E9F34925F');
        $this->addSql('DROP INDEX IDX_EAA5610E9F34925F');
        $this->addSql('CREATE SEQUENCE realisation_id_seq');
        $this->addSql('SELECT setval(\'realisation_id_seq\', (SELECT MAX(id) FROM realisation))');
        $this->addSql('ALTER TABLE realisation ALTER id SET DEFAULT nextval(\'realisation_id_seq\')');
        $this->addSql('ALTER TABLE realisation ALTER description TYPE VARCHAR(500)');
        $this->addSql('ALTER TABLE realisation RENAME COLUMN id_categorie_id TO categorie_id');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT fk_eaa5610ebcf5e72d FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_eaa5610ebcf5e72d ON realisation (categorie_id)');
        $this->addSql('CREATE SEQUENCE categorie_id_seq');
        $this->addSql('SELECT setval(\'categorie_id_seq\', (SELECT MAX(id) FROM categorie))');
        $this->addSql('ALTER TABLE categorie ALTER id SET DEFAULT nextval(\'categorie_id_seq\')');
    }
}
