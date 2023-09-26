<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926120315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_dish (category_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_1EE6F6FF12469DE2 (category_id), INDEX IDX_1EE6F6FF148EB0CB (dish_id), PRIMARY KEY(category_id, dish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_hours (id INT AUTO_INCREMENT NOT NULL, hour VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish_category (dish_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_1FB098AA148EB0CB (dish_id), INDEX IDX_1FB098AA12469DE2 (category_id), PRIMARY KEY(dish_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_hours (id INT AUTO_INCREMENT NOT NULL, hour VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, conditions LONGTEXT NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, lunch_hours_id INT DEFAULT NULL, dinner_hours_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, nb_people INT NOT NULL, nb_children INT NOT NULL, date DATE NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C84955F14196D7 (lunch_hours_id), INDEX IDX_42C84955303F6001 (dinner_hours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_allergy (reservation_id INT NOT NULL, allergy_id INT NOT NULL, INDEX IDX_AC24F930B83297E7 (reservation_id), INDEX IDX_AC24F930DBFD579D (allergy_id), PRIMARY KEY(reservation_id, allergy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(50) NOT NULL, opening_time_midday VARCHAR(255) DEFAULT NULL, closing_time_midday VARCHAR(255) DEFAULT NULL, opening_time_evening VARCHAR(255) DEFAULT NULL, closing_time_evening VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) DEFAULT NULL, nb_people INT DEFAULT NULL, nb_children INT DEFAULT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_allergy (user_id INT NOT NULL, allergy_id INT NOT NULL, INDEX IDX_93BC5CBFA76ED395 (user_id), INDEX IDX_93BC5CBFDBFD579D (allergy_id), PRIMARY KEY(user_id, allergy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_dish ADD CONSTRAINT FK_1EE6F6FF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_dish ADD CONSTRAINT FK_1EE6F6FF148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish_category ADD CONSTRAINT FK_1FB098AA148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish_category ADD CONSTRAINT FK_1FB098AA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F14196D7 FOREIGN KEY (lunch_hours_id) REFERENCES lunch_hours (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955303F6001 FOREIGN KEY (dinner_hours_id) REFERENCES dinner_hours (id)');
        $this->addSql('ALTER TABLE reservation_allergy ADD CONSTRAINT FK_AC24F930B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_allergy ADD CONSTRAINT FK_AC24F930DBFD579D FOREIGN KEY (allergy_id) REFERENCES allergy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_allergy ADD CONSTRAINT FK_93BC5CBFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_allergy ADD CONSTRAINT FK_93BC5CBFDBFD579D FOREIGN KEY (allergy_id) REFERENCES allergy (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_dish DROP FOREIGN KEY FK_1EE6F6FF12469DE2');
        $this->addSql('ALTER TABLE category_dish DROP FOREIGN KEY FK_1EE6F6FF148EB0CB');
        $this->addSql('ALTER TABLE dish_category DROP FOREIGN KEY FK_1FB098AA148EB0CB');
        $this->addSql('ALTER TABLE dish_category DROP FOREIGN KEY FK_1FB098AA12469DE2');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F14196D7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955303F6001');
        $this->addSql('ALTER TABLE reservation_allergy DROP FOREIGN KEY FK_AC24F930B83297E7');
        $this->addSql('ALTER TABLE reservation_allergy DROP FOREIGN KEY FK_AC24F930DBFD579D');
        $this->addSql('ALTER TABLE user_allergy DROP FOREIGN KEY FK_93BC5CBFA76ED395');
        $this->addSql('ALTER TABLE user_allergy DROP FOREIGN KEY FK_93BC5CBFDBFD579D');
        $this->addSql('DROP TABLE allergy');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_dish');
        $this->addSql('DROP TABLE dinner_hours');
        $this->addSql('DROP TABLE dish');
        $this->addSql('DROP TABLE dish_category');
        $this->addSql('DROP TABLE lunch_hours');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_allergy');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_allergy');
    }
}
