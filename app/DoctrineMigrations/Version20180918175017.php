<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180918175017 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Menu DROP FOREIGN KEY FK_C93A0E95B2ED7449');
        $this->addSql('DROP INDEX IDX_C93A0E95B2ED7449 ON pilot_Menu');
        $this->addSql('ALTER TABLE pilot_Menu DROP menuTypeId');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Menu` ADD menuTypeId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `pilot_Menu` ADD CONSTRAINT FK_C93A0E95B2ED7449 FOREIGN KEY (menuTypeId) REFERENCES pilot_MenuType (id)');
        $this->addSql('CREATE INDEX IDX_C93A0E95B2ED7449 ON `pilot_Menu` (menuTypeId)');
    }
}
