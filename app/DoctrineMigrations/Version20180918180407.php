<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180918180407 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Block ADD `menuid` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Block ADD CONSTRAINT FK_6ACC0D2376576AC8 FOREIGN KEY (`menuid`) REFERENCES `pilot_Menu` (`id`)');
        $this->addSql('CREATE INDEX IDX_6ACC0D2376576AC8 ON pilot_Block (`menuid`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Block` DROP FOREIGN KEY FK_6ACC0D2376576AC8');
        $this->addSql('DROP INDEX IDX_6ACC0D2376576AC8 ON `pilot_Block`');
        $this->addSql('ALTER TABLE `pilot_Block` DROP `menuid`');
    }
}
