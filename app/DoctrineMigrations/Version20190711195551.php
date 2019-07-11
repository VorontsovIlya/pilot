<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711195551 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Slide ADD `lft` INT NOT NULL, ADD `rgt` INT NOT NULL, ADD `lvl` INT NOT NULL, ADD `tree_root` INT DEFAULT NULL, ADD `parent_id` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Slide ADD CONSTRAINT FK_9B3874633C49B97 FOREIGN KEY (`tree_root`) REFERENCES `pilot_Slide` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_Slide ADD CONSTRAINT FK_9B387463171ECA81 FOREIGN KEY (`parent_id`) REFERENCES `pilot_Slide` (`id`) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_9B3874633C49B97 ON pilot_Slide (`tree_root`)');
        $this->addSql('CREATE INDEX IDX_9B387463171ECA81 ON pilot_Slide (`parent_id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Slide` DROP FOREIGN KEY FK_9B3874633C49B97');
        $this->addSql('ALTER TABLE `pilot_Slide` DROP FOREIGN KEY FK_9B387463171ECA81');
        $this->addSql('DROP INDEX IDX_9B3874633C49B97 ON `pilot_Slide`');
        $this->addSql('DROP INDEX IDX_9B387463171ECA81 ON `pilot_Slide`');
        $this->addSql('ALTER TABLE `pilot_Slide` DROP `lft`, DROP `rgt`, DROP `lvl`, DROP `tree_root`, DROP `parent_id`');
    }
}
