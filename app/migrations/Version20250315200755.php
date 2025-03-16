<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250315200755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables for project';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, id_model INT NOT NULL, photo VARCHAR(255) NOT NULL, price INT NOT NULL, INDEX IDX_773DE69D391033E9 (id_model), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE credit_program (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, interest_rate NUMERIC(5, 2) DEFAULT NULL, credit_amount_from DOUBLE PRECISION NOT NULL, credit_amount_to DOUBLE PRECISION NOT NULL, loan_term_from INT NOT NULL, loan_term_to INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, id_brand INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D79572D9F2D7B868 (id_brand), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, id_car INT NOT NULL, id_credit_program INT NOT NULL, initial_payment INT NOT NULL, loan_term INT NOT NULL, INDEX IDX_3B978F9FE9990EC7 (id_car), INDEX IDX_3B978F9F950FADAD (id_credit_program), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D391033E9 FOREIGN KEY (id_model) REFERENCES model (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9F2D7B868 FOREIGN KEY (id_brand) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FE9990EC7 FOREIGN KEY (id_car) REFERENCES car (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9F950FADAD FOREIGN KEY (id_credit_program) REFERENCES credit_program (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D391033E9');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9F2D7B868');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FE9990EC7');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9F950FADAD');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE credit_program');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE request');
    }
}
