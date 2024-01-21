<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120153129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_answer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_answer_option_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE question (id INT NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question_answer (id INT NOT NULL, question_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DD80652D1E27F6BF ON question_answer (question_id)');
        $this->addSql('CREATE INDEX IDX_DD80652DA76ED395 ON question_answer (user_id)');
        $this->addSql('CREATE TABLE question_answer_question_answer_option (question_answer_id INT NOT NULL, question_answer_option_id INT NOT NULL, PRIMARY KEY(question_answer_id, question_answer_option_id))');
        $this->addSql('CREATE INDEX IDX_3209B32CA3E60C9C ON question_answer_question_answer_option (question_answer_id)');
        $this->addSql('CREATE INDEX IDX_3209B32CDF2017A6 ON question_answer_question_answer_option (question_answer_option_id)');
        $this->addSql('CREATE TABLE question_answer_option (id INT NOT NULL, question_id INT NOT NULL, text VARCHAR(255) NOT NULL, is_right BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_303EF0501E27F6BF ON question_answer_option (question_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE question_answer ADD CONSTRAINT FK_DD80652D1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_answer ADD CONSTRAINT FK_DD80652DA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_answer_question_answer_option ADD CONSTRAINT FK_3209B32CA3E60C9C FOREIGN KEY (question_answer_id) REFERENCES question_answer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_answer_question_answer_option ADD CONSTRAINT FK_3209B32CDF2017A6 FOREIGN KEY (question_answer_option_id) REFERENCES question_answer_option (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_answer_option ADD CONSTRAINT FK_303EF0501E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE question_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_answer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_answer_option_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('ALTER TABLE question_answer DROP CONSTRAINT FK_DD80652D1E27F6BF');
        $this->addSql('ALTER TABLE question_answer DROP CONSTRAINT FK_DD80652DA76ED395');
        $this->addSql('ALTER TABLE question_answer_question_answer_option DROP CONSTRAINT FK_3209B32CA3E60C9C');
        $this->addSql('ALTER TABLE question_answer_question_answer_option DROP CONSTRAINT FK_3209B32CDF2017A6');
        $this->addSql('ALTER TABLE question_answer_option DROP CONSTRAINT FK_303EF0501E27F6BF');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_answer');
        $this->addSql('DROP TABLE question_answer_question_answer_option');
        $this->addSql('DROP TABLE question_answer_option');
        $this->addSql('DROP TABLE "user"');
    }
}
