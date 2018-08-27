<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180605192512 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Feedback ADD `field02` VARCHAR(255) DEFAULT NULL, ADD `field03` VARCHAR(255) DEFAULT NULL, ADD `field04` VARCHAR(255) DEFAULT NULL, ADD `field05` VARCHAR(255) DEFAULT NULL, ADD `field06` VARCHAR(255) DEFAULT NULL, ADD `field07` VARCHAR(255) DEFAULT NULL, ADD `field08` VARCHAR(255) DEFAULT NULL, ADD `field09` VARCHAR(255) DEFAULT NULL, ADD `field10` VARCHAR(255) DEFAULT NULL, DROP mail, DROP name, DROP phone, DROP type, CHANGE who `field01` VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Feedback` ADD mail VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD phone VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD who VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, ADD type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP `field01`, DROP `field02`, DROP `field03`, DROP `field04`, DROP `field05`, DROP `field06`, DROP `field07`, DROP `field08`, DROP `field09`, DROP `field10`');
    }
}
