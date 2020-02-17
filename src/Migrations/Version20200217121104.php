<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200217121104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE criteria (id INT AUTO_INCREMENT NOT NULL, quiz_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_B61F9B81853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trainer (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, trainer_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A412FA92FB08EDF6 (trainer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, trainer_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, INDEX IDX_A4698DB2FB08EDF6 (trainer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, criteria_id INT DEFAULT NULL, students_id INT DEFAULT NULL, test SMALLINT NOT NULL, interviews SMALLINT NOT NULL, INDEX IDX_9FA3E414990BEA15 (criteria_id), INDEX IDX_9FA3E4141AD8D010 (students_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE criteria ADD CONSTRAINT FK_B61F9B81853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB2FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E414990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E4141AD8D010 FOREIGN KEY (students_id) REFERENCES students (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414990BEA15');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92FB08EDF6');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB2FB08EDF6');
        $this->addSql('ALTER TABLE criteria DROP FOREIGN KEY FK_B61F9B81853CD175');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E4141AD8D010');
        $this->addSql('DROP TABLE criteria');
        $this->addSql('DROP TABLE trainer');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE results');
    }
}
