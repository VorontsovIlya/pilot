<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190324184206 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Artist ADD `poster` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Artist ADD CONSTRAINT FK_76B7718BE48BCC45 FOREIGN KEY (`poster`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('CREATE INDEX IDX_76B7718BE48BCC45 ON pilot_Artist (`poster`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718BE48BCC45');
        $this->addSql('DROP INDEX IDX_76B7718BE48BCC45 ON `pilot_Artist`');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP `poster`');
    }
}
