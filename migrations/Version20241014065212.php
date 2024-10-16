<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241014065212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(600) NOT NULL, image VARCHAR(300) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_94D4687FBCF5E72D ON competence (categorie_id)');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE realisation DROP CONSTRAINT fk_94d4687fbcf5e72d');
        $this->addSql('DROP INDEX idx_94d4687fbcf5e72d');
        $this->addSql('ALTER TABLE realisation ADD lien_git VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE realisation DROP categorie_id');
        $this->addSql('ALTER TABLE realisation DROP description');
        $this->addSql('ALTER TABLE realisation ALTER image TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE competence DROP CONSTRAINT FK_94D4687FBCF5E72D');
        $this->addSql('DROP TABLE competence');
        $this->addSql('ALTER TABLE realisation ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE realisation ADD description VARCHAR(600) NOT NULL');
        $this->addSql('ALTER TABLE realisation DROP lien_git');
        $this->addSql('ALTER TABLE realisation ALTER image TYPE VARCHAR(300)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT fk_94d4687fbcf5e72d FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_94d4687fbcf5e72d ON realisation (categorie_id)');
    }
}
