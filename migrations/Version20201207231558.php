<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207231558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, task_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, correct VARCHAR(255) NOT NULL, INDEX IDX_DADD4A25B8E08577 (task_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, try_test_id_id INT NOT NULL, answer_id_id INT NOT NULL, INDEX IDX_9FA3E4143D654EFB (try_test_id_id), UNIQUE INDEX UNIQ_9FA3E414E47E7704 (answer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, test_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_527EDB25749A385C (test_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, category_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_D87F7E0C9777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE try_test (id INT AUTO_INCREMENT NOT NULL, test_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, INDEX IDX_599A2402749A385C (test_id_id), INDEX IDX_599A24029D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25B8E08577 FOREIGN KEY (task_id_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E4143D654EFB FOREIGN KEY (try_test_id_id) REFERENCES try_test (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E414E47E7704 FOREIGN KEY (answer_id_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25749A385C FOREIGN KEY (test_id_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE try_test ADD CONSTRAINT FK_599A2402749A385C FOREIGN KEY (test_id_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE try_test ADD CONSTRAINT FK_599A24029D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414E47E7704');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C9777D11E');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25B8E08577');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25749A385C');
        $this->addSql('ALTER TABLE try_test DROP FOREIGN KEY FK_599A2402749A385C');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E4143D654EFB');
        $this->addSql('ALTER TABLE try_test DROP FOREIGN KEY FK_599A24029D86650F');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE results');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE try_test');
        $this->addSql('DROP TABLE user');
    }
}
