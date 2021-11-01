<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101111207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE visitas (id INT AUTO_INCREMENT NOT NULL, url_id INT NOT NULL, visit_date DATETIME NOT NULL, INDEX IDX_2361FC8781CFDAE7 (url_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE visitas ADD CONSTRAINT FK_2361FC8781CFDAE7 FOREIGN KEY (url_id) REFERENCES urls (id)');
        $this->addSql('ALTER TABLE urls DROP visitas');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE visitas');
        $this->addSql('ALTER TABLE urls ADD visitas INT DEFAULT NULL');
    }
}
