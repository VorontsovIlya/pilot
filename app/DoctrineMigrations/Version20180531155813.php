<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180531155813 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Block ADD `custboolattr01` TINYINT(1) DEFAULT NULL, ADD `custboolattr02` TINYINT(1) DEFAULT NULL, ADD `custboolattr03` TINYINT(1) DEFAULT NULL, ADD `custtextattr01` LONGTEXT DEFAULT NULL, ADD `custtextattr02` LONGTEXT DEFAULT NULL, ADD `custtextattr03` LONGTEXT DEFAULT NULL, ADD `custmediattr01` INT DEFAULT NULL, ADD `custmediattr02` INT DEFAULT NULL, ADD `custmediattr03` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Block ADD CONSTRAINT FK_6ACC0D2375304476 FOREIGN KEY (`custmediattr01`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('ALTER TABLE pilot_Block ADD CONSTRAINT FK_6ACC0D235E1D17B5 FOREIGN KEY (`custmediattr02`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('ALTER TABLE pilot_Block ADD CONSTRAINT FK_6ACC0D23470626F4 FOREIGN KEY (`custmediattr03`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('CREATE INDEX IDX_6ACC0D2375304476 ON pilot_Block (`custmediattr01`)');
        $this->addSql('CREATE INDEX IDX_6ACC0D235E1D17B5 ON pilot_Block (`custmediattr02`)');
        $this->addSql('CREATE INDEX IDX_6ACC0D23470626F4 ON pilot_Block (`custmediattr03`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Block` DROP FOREIGN KEY FK_6ACC0D2375304476');
        $this->addSql('ALTER TABLE `pilot_Block` DROP FOREIGN KEY FK_6ACC0D235E1D17B5');
        $this->addSql('ALTER TABLE `pilot_Block` DROP FOREIGN KEY FK_6ACC0D23470626F4');
        $this->addSql('DROP INDEX IDX_6ACC0D2375304476 ON `pilot_Block`');
        $this->addSql('DROP INDEX IDX_6ACC0D235E1D17B5 ON `pilot_Block`');
        $this->addSql('DROP INDEX IDX_6ACC0D23470626F4 ON `pilot_Block`');
        $this->addSql('ALTER TABLE `pilot_Block` DROP `custboolattr01`, DROP `custboolattr02`, DROP `custboolattr03`, DROP `custtextattr01`, DROP `custtextattr02`, DROP `custtextattr03`, DROP `custmediattr01`, DROP `custmediattr02`, DROP `custmediattr03`');
    }
}
