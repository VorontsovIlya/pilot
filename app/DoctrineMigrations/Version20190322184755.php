<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190322184755 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_orm_routes` (`host` VARCHAR(255) NOT NULL, `schemes` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `methods` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `defaults` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `requirements` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `options` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `condition_expr` VARCHAR(255) DEFAULT NULL, `variablePattern` VARCHAR(255) DEFAULT NULL, `staticPrefix` VARCHAR(255) DEFAULT NULL, `name` VARCHAR(255) NOT NULL, `position` INT NOT NULL, `id` INT AUTO_INCREMENT NOT NULL, UNIQUE INDEX UNIQ_A7EDD34C999517A (`name`), INDEX name_idx (name), INDEX prefix_idx (staticPrefix), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_orm_routes`');
    }
}
