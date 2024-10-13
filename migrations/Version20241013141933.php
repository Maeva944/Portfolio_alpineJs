<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241013141933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_94D4687FBCF5E72D ON competence (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE competence DROP CONSTRAINT FK_94D4687FBCF5E72D');
        $this->addSql('DROP INDEX IDX_94D4687FBCF5E72D');
        $this->addSql('ALTER TABLE competence DROP categorie_id');
    }
}
