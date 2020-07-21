<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721140453 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, area_code VARCHAR(6) NOT NULL, area_name VARCHAR(255) NOT NULL, area_slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D7943D68F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audience (id INT AUTO_INCREMENT NOT NULL, age_group VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_poi (category_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_5879B28C12469DE2 (category_id), INDEX IDX_5879B28C7EACE855 (poi_id), PRIMARY KEY(category_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, department_id INT DEFAULT NULL, city_code VARCHAR(6) NOT NULL, city_name VARCHAR(255) NOT NULL, city_gps_lat NUMERIC(10, 6) DEFAULT NULL, city_gps_lng NUMERIC(10, 6) DEFAULT NULL, city_slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_2D5B0234AE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, poi_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content LONGTEXT NOT NULL, picture VARCHAR(128) DEFAULT NULL, rate SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_9474526C7EACE855 (poi_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, poi_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, phone VARCHAR(10) DEFAULT NULL, email VARCHAR(64) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_4C62E6387EACE855 (poi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_role (contact_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_7F960895E7A1254A (contact_id), INDEX IDX_7F960895D60322AC (role_id), PRIMARY KEY(contact_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, country_code VARCHAR(6) NOT NULL, country_name VARCHAR(255) NOT NULL, country_slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, department_code VARCHAR(6) NOT NULL, department_name VARCHAR(255) NOT NULL, department_slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CD1DE18ABD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, poi_id INT DEFAULT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_29D6873E7EACE855 (poi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE period (id INT AUTO_INCREMENT NOT NULL, period_name VARCHAR(255) NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, start_time TIME DEFAULT NULL, end_time TIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE period_offer (period_id INT NOT NULL, offer_id INT NOT NULL, INDEX IDX_187E0F5BEC8B7ADE (period_id), INDEX IDX_187E0F5B53C674EE (offer_id), PRIMARY KEY(period_id, offer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, poi_name LONGTEXT NOT NULL, description LONGTEXT NOT NULL, street_number VARCHAR(4) NOT NULL, street_name VARCHAR(255) NOT NULL, poi_gps_lat NUMERIC(10, 6) DEFAULT NULL, poi_gps_lng NUMERIC(10, 6) DEFAULT NULL, poi_slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_7DBB1FD68BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, audience_id INT DEFAULT NULL, price NUMERIC(5, 2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_CAC822D953C674EE (offer_id), INDEX IDX_CAC822D9848CC616 (audience_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, review_name VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review_poi (review_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_718C131F3E2E969B (review_id), INDEX IDX_718C131F7EACE855 (poi_id), PRIMARY KEY(review_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(100) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, tag_name VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_poi (tag_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_7C6585D4BAD26311 (tag_id), INDEX IDX_7C6585D47EACE855 (poi_id), PRIMARY KEY(tag_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(180) NOT NULL, username_role LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE area ADD CONSTRAINT FK_D7943D68F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE category_poi ADD CONSTRAINT FK_5879B28C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_poi ADD CONSTRAINT FK_5879B28C7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id)');
        $this->addSql('ALTER TABLE contact_role ADD CONSTRAINT FK_7F960895E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_role ADD CONSTRAINT FK_7F960895D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18ABD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id)');
        $this->addSql('ALTER TABLE period_offer ADD CONSTRAINT FK_187E0F5BEC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE period_offer ADD CONSTRAINT FK_187E0F5B53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poi ADD CONSTRAINT FK_7DBB1FD68BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D953C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9848CC616 FOREIGN KEY (audience_id) REFERENCES audience (id)');
        $this->addSql('ALTER TABLE review_poi ADD CONSTRAINT FK_718C131F3E2E969B FOREIGN KEY (review_id) REFERENCES review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review_poi ADD CONSTRAINT FK_718C131F7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_poi ADD CONSTRAINT FK_7C6585D4BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_poi ADD CONSTRAINT FK_7C6585D47EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18ABD0F409C');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9848CC616');
        $this->addSql('ALTER TABLE category_poi DROP FOREIGN KEY FK_5879B28C12469DE2');
        $this->addSql('ALTER TABLE poi DROP FOREIGN KEY FK_7DBB1FD68BAC62AF');
        $this->addSql('ALTER TABLE contact_role DROP FOREIGN KEY FK_7F960895E7A1254A');
        $this->addSql('ALTER TABLE area DROP FOREIGN KEY FK_D7943D68F92F3E70');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234AE80F5DF');
        $this->addSql('ALTER TABLE period_offer DROP FOREIGN KEY FK_187E0F5B53C674EE');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D953C674EE');
        $this->addSql('ALTER TABLE period_offer DROP FOREIGN KEY FK_187E0F5BEC8B7ADE');
        $this->addSql('ALTER TABLE category_poi DROP FOREIGN KEY FK_5879B28C7EACE855');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7EACE855');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6387EACE855');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E7EACE855');
        $this->addSql('ALTER TABLE review_poi DROP FOREIGN KEY FK_718C131F7EACE855');
        $this->addSql('ALTER TABLE tag_poi DROP FOREIGN KEY FK_7C6585D47EACE855');
        $this->addSql('ALTER TABLE review_poi DROP FOREIGN KEY FK_718C131F3E2E969B');
        $this->addSql('ALTER TABLE contact_role DROP FOREIGN KEY FK_7F960895D60322AC');
        $this->addSql('ALTER TABLE tag_poi DROP FOREIGN KEY FK_7C6585D4BAD26311');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE audience');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_poi');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_role');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE period');
        $this->addSql('DROP TABLE period_offer');
        $this->addSql('DROP TABLE poi');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE review_poi');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_poi');
        $this->addSql('DROP TABLE user');
    }
}
