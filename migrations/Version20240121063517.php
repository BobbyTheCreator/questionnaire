<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240121063517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO \"user\" (id) VALUES(nextval('user_id_seq'))");
        $this->addSql("INSERT INTO question (id, text) VALUES
                                    (nextval('question_id_seq'), '1 + 1 = '),
                                    (nextval('question_id_seq'), '2 + 2 = '),
                                    (nextval('question_id_seq'), '3 + 3 = '),
                                    (nextval('question_id_seq'), '4 + 4 = '),
                                    (nextval('question_id_seq'), '5 + 5 = '),
                                    (nextval('question_id_seq'), '6 + 6 = '),
                                    (nextval('question_id_seq'), '7 + 7 = '),
                                    (nextval('question_id_seq'), '8 + 8 = '),
                                    (nextval('question_id_seq'), '9 + 9 = '),
                                    (nextval('question_id_seq'), '10 + 10 = ')
                                    ");
        $this->addSql("INSERT INTO question_answer_option (id, question_id, text, is_right) VALUES
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '1 + 1 = '), '3', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '1 + 1 = '), '2', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '1 + 1 = '), '0', false),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '2 + 2 = '), '4', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '2 + 2 = '), '3 + 1', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '2 + 2 = '), '10', false),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '3 + 3 = '), '1 + 5', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '3 + 3 = '), '1', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '3 + 3 = '), '6', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '3 + 3 = '), '2 + 4', true),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '4 + 4 = '), '8', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '4 + 4 = '), '4', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '4 + 4 = '), '0', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '4 + 4 = '), '0 + 8', true),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '5 + 5 = '), '6', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '5 + 5 = '), '18', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '5 + 5 = '), '10', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '5 + 5 = '), '9', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '5 + 5 = '), '0', false),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '6 + 6 = '), '3', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '6 + 6 = '), '9', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '6 + 6 = '), '0', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '6 + 6 = '), '12', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '6 + 6 = '), '5 + 7', true),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '7 + 7 = '), '5', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '7 + 7 = '), '14', true),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '8 + 8 = '), '16', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '8 + 8 = '), '12', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '8 + 8 = '), '9', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '8 + 8 = '), '5', false),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '9 + 9 = '), '18', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '9 + 9 = '), '9', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '9 + 9 = '), '17 + 1', true),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '9 + 9 = '), '2 + 16', true),

                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '10 + 10 = '), '0', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '10 + 10 = '), '2', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '10 + 10 = '), '8', false),
                                    (nextval('question_answer_option_id_seq'), (SELECT id from question where text = '10 + 10 = '), '20', true)
                                    ");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE question_answer_option CASCADE');
        $this->addSql('TRUNCATE question CASCADE');
        $this->addSql('TRUNCATE "user" CASCADE');
    }
}
