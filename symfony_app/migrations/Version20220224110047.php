<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220224110047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_system_memorar (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, phone_number VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_system_memorar (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, phone VARCHAR(19) NOT NULL, email VARCHAR(100) NOT NULL, birth_date DATETIME NOT NULL, password VARCHAR(255) NOT NULL, cpf VARCHAR(11) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_system_memorar');
        $this->addSql('DROP TABLE users_system_memorar');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
