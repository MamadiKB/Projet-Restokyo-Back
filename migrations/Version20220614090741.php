<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220614090741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, establishment_id INT NOT NULL, user_id INT NOT NULL, username VARCHAR(100) NOT NULL, published_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', content LONGTEXT NOT NULL, rating NUMERIC(3, 1) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, INDEX IDX_9474526C8565851 (establishment_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE establishment (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, opening_time_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, type VARCHAR(255) DEFAULT NULL, description VARCHAR(100) NOT NULL, address VARCHAR(200) NOT NULL, price INT DEFAULT NULL, opening_days LONGTEXT DEFAULT NULL, noon_opening_time LONGTEXT DEFAULT NULL, evening_opening_time LONGTEXT DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, phone INT DEFAULT NULL, rating NUMERIC(3, 1) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, status INT NOT NULL, INDEX IDX_DBEFB1EEB08FA272 (district_id), INDEX IDX_DBEFB1EE6A8073BB (opening_time_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_time (id INT AUTO_INCREMENT NOT NULL, monday_open_noon NUMERIC(4, 2) DEFAULT NULL, monday_close_noon NUMERIC(4, 2) DEFAULT NULL, monday_open_evening NUMERIC(4, 2) DEFAULT NULL, monday_close_evening NUMERIC(4, 2) DEFAULT NULL, tuesday_open_noon NUMERIC(4, 2) DEFAULT NULL, tuesday_close_noon NUMERIC(4, 2) DEFAULT NULL, tuesday_open_evening NUMERIC(4, 2) DEFAULT NULL, tuesday_close_evening NUMERIC(4, 2) DEFAULT NULL, wednesday_open_noon NUMERIC(4, 2) DEFAULT NULL, wednesday_close_noon NUMERIC(4, 2) DEFAULT NULL, wednesday_open_evening NUMERIC(4, 2) DEFAULT NULL, wednesday_close_evening NUMERIC(4, 2) DEFAULT NULL, thursday_open_noon NUMERIC(4, 2) DEFAULT NULL, thursday_close_noon NUMERIC(4, 2) DEFAULT NULL, thursday_open_evening NUMERIC(4, 2) DEFAULT NULL, thursday_close_evening NUMERIC(4, 2) DEFAULT NULL, friday_open_noon NUMERIC(4, 2) DEFAULT NULL, friday_close_noon NUMERIC(4, 2) DEFAULT NULL, friday_open_evening NUMERIC(4, 2) DEFAULT NULL, friday_close_evening NUMERIC(4, 2) DEFAULT NULL, saturday_open_noon NUMERIC(4, 2) DEFAULT NULL, saturday_close_noon NUMERIC(4, 2) DEFAULT NULL, saturday_open_evening NUMERIC(4, 2) DEFAULT NULL, saturday_close_evening NUMERIC(4, 2) DEFAULT NULL, sunday_open_noon NUMERIC(4, 2) DEFAULT NULL, sunday_close_noon NUMERIC(4, 2) DEFAULT NULL, sunday_open_evening NUMERIC(4, 2) DEFAULT NULL, sunday_close_evening NUMERIC(4, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_establishment (tag_id INT NOT NULL, establishment_id INT NOT NULL, INDEX IDX_3541C6E9BAD26311 (tag_id), INDEX IDX_3541C6E98565851 (establishment_id), PRIMARY KEY(tag_id, establishment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL, lastname VARCHAR(100) DEFAULT NULL, firstname VARCHAR(100) DEFAULT NULL, birthdate DATE DEFAULT NULL, nationality VARCHAR(100) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, role VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C8565851 FOREIGN KEY (establishment_id) REFERENCES establishment (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EEB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EE6A8073BB FOREIGN KEY (opening_time_id) REFERENCES opening_time (id)');
        $this->addSql('ALTER TABLE tag_establishment ADD CONSTRAINT FK_3541C6E9BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_establishment ADD CONSTRAINT FK_3541C6E98565851 FOREIGN KEY (establishment_id) REFERENCES establishment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EEB08FA272');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C8565851');
        $this->addSql('ALTER TABLE tag_establishment DROP FOREIGN KEY FK_3541C6E98565851');
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EE6A8073BB');
        $this->addSql('ALTER TABLE tag_establishment DROP FOREIGN KEY FK_3541C6E9BAD26311');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE establishment');
        $this->addSql('DROP TABLE opening_time');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_establishment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}