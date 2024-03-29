<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208165851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artista (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) NOT NULL, description VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, username VARCHAR(50) NOT NULL, email VARCHAR(75) NOT NULL, password VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vinilo (id INT AUTO_INCREMENT NOT NULL, artista_id INT NOT NULL, name VARCHAR(150) NOT NULL, price INT NOT NULL, description VARCHAR(250) NOT NULL, INDEX IDX_702172BEAEB0CF13 (artista_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vinilo ADD CONSTRAINT FK_702172BEAEB0CF13 FOREIGN KEY (artista_id) REFERENCES artista (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vinilo DROP FOREIGN KEY FK_702172BEAEB0CF13');
        $this->addSql('DROP TABLE artista');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE vinilo');
    }
}
