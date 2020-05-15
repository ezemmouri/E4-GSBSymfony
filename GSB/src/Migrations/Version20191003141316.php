<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191003141316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6F01A7757');
        $this->addSql('DROP TABLE inscris');
        $this->addSql('DROP INDEX IDX_5E90F6D6F01A7757 ON inscription');
        $this->addSql('ALTER TABLE inscription CHANGE inscris_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6A76ED395 ON inscription (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inscris (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, mdp VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, nom VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A76ED395');
        $this->addSql('DROP INDEX IDX_5E90F6D6A76ED395 ON inscription');
        $this->addSql('ALTER TABLE inscription CHANGE user_id inscris_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6F01A7757 FOREIGN KEY (inscris_id) REFERENCES inscris (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6F01A7757 ON inscription (inscris_id)');
    }
}
