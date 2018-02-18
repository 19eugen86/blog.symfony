<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180218101237 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C2130303A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C29F6EE60');
        $this->addSql('DROP INDEX IDX_9474526C2130303A ON comment');
        $this->addSql('DROP INDEX IDX_9474526C29F6EE60 ON comment');
        $this->addSql('ALTER TABLE comment ADD user_id INT DEFAULT NULL, DROP from_user_id, DROP to_user_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('ALTER TABLE comment ADD to_user_id INT DEFAULT NULL, CHANGE user_id from_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C2130303A FOREIGN KEY (from_user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C29F6EE60 FOREIGN KEY (to_user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C2130303A ON comment (from_user_id)');
        $this->addSql('CREATE INDEX IDX_9474526C29F6EE60 ON comment (to_user_id)');
    }
}
