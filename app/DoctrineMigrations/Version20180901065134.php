<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180901065134 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Menu ADD `tree_root` INT DEFAULT NULL, ADD `parent_id` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Menu ADD CONSTRAINT FK_C93A0E953C49B97 FOREIGN KEY (`tree_root`) REFERENCES `pilot_Menu` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_Menu ADD CONSTRAINT FK_C93A0E95171ECA81 FOREIGN KEY (`parent_id`) REFERENCES `pilot_Menu` (`id`) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_C93A0E953C49B97 ON pilot_Menu (`tree_root`)');
        $this->addSql('CREATE INDEX IDX_C93A0E95171ECA81 ON pilot_Menu (`parent_id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Menu` DROP FOREIGN KEY FK_C93A0E953C49B97');
        $this->addSql('ALTER TABLE `pilot_Menu` DROP FOREIGN KEY FK_C93A0E95171ECA81');
        $this->addSql('DROP INDEX IDX_C93A0E953C49B97 ON `pilot_Menu`');
        $this->addSql('DROP INDEX IDX_C93A0E95171ECA81 ON `pilot_Menu`');
        $this->addSql('ALTER TABLE `pilot_Menu` DROP `tree_root`, DROP `parent_id`');
    }
}
