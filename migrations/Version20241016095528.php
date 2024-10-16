<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241016095528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realisation DROP CONSTRAINT FK_EAA5610E9F34925F');
        $this->addSql('DROP INDEX IDX_EAA5610E9F34925F');
        $this->addSql('ALTER TABLE realisation RENAME COLUMN id_categorie TO id_categorie_id');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610E9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_EAA5610E9F34925F ON realisation (id_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE realisation DROP CONSTRAINT fk_eaa5610e9f34925f');
        $this->addSql('DROP INDEX idx_eaa5610e9f34925f');
        $this->addSql('ALTER TABLE realisation RENAME COLUMN id_categorie_id TO id_categorie');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT fk_eaa5610e9f34925f FOREIGN KEY (id_categorie) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_eaa5610e9f34925f ON realisation (id_categorie)');
    }
}
