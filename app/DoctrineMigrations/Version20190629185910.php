<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190629185910 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Artist ADD `path_sec` VARCHAR(255) NOT NULL, ADD `lft` INT NOT NULL, ADD `rgt` INT NOT NULL, ADD `lvl` INT NOT NULL, ADD `poster_sq` INT DEFAULT NULL, ADD `tree_root` INT DEFAULT NULL, ADD `parent_id` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Artist ADD CONSTRAINT FK_76B7718B115C4326 FOREIGN KEY (`poster_sq`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('ALTER TABLE pilot_Artist ADD CONSTRAINT FK_76B7718B3C49B97 FOREIGN KEY (`tree_root`) REFERENCES `pilot_Artist` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_Artist ADD CONSTRAINT FK_76B7718B171ECA81 FOREIGN KEY (`parent_id`) REFERENCES `pilot_Artist` (`id`) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_76B7718B115C4326 ON pilot_Artist (`poster_sq`)');
        $this->addSql('CREATE INDEX IDX_76B7718B3C49B97 ON pilot_Artist (`tree_root`)');
        $this->addSql('CREATE INDEX IDX_76B7718B171ECA81 ON pilot_Artist (`parent_id`)');
        $this->addSql('ALTER TABLE pilot_Video ADD `releasedate` DATE DEFAULT \'2018-01-01\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718B115C4326');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718B3C49B97');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718B171ECA81');
        $this->addSql('DROP INDEX IDX_76B7718B115C4326 ON `pilot_Artist`');
        $this->addSql('DROP INDEX IDX_76B7718B3C49B97 ON `pilot_Artist`');
        $this->addSql('DROP INDEX IDX_76B7718B171ECA81 ON `pilot_Artist`');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP `path_sec`, DROP `lft`, DROP `rgt`, DROP `lvl`, DROP `poster_sq`, DROP `tree_root`, DROP `parent_id`');
        $this->addSql('ALTER TABLE `pilot_Video` DROP `releasedate`');
    }
}
