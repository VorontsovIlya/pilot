<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180604175810 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_block_slide DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE pilot_block_slide ADD `block_id` INT NOT NULL');
        $this->addSql('ALTER TABLE pilot_block_slide ADD CONSTRAINT FK_7E382148428B57D4 FOREIGN KEY (`block_id`) REFERENCES `pilot_Block` (`id`)');
        $this->addSql('ALTER TABLE pilot_block_slide ADD CONSTRAINT FK_7E38214838D5BA05 FOREIGN KEY (`slide_id`) REFERENCES `pilot_Slide` (`id`) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_7E382148428B57D4 ON pilot_block_slide (`block_id`)');
        $this->addSql('CREATE INDEX IDX_7E38214838D5BA05 ON pilot_block_slide (`slide_id`)');
        $this->addSql('ALTER TABLE pilot_block_slide ADD PRIMARY KEY (`block_id`, `slide_id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_block_slide` DROP FOREIGN KEY FK_7E382148428B57D4');
        $this->addSql('ALTER TABLE `pilot_block_slide` DROP FOREIGN KEY FK_7E38214838D5BA05');
        $this->addSql('DROP INDEX IDX_7E382148428B57D4 ON `pilot_block_slide`');
        $this->addSql('DROP INDEX IDX_7E38214838D5BA05 ON `pilot_block_slide`');
        $this->addSql('ALTER TABLE `pilot_block_slide` DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE `pilot_block_slide` DROP `block_id`');
        $this->addSql('ALTER TABLE `pilot_block_slide` ADD PRIMARY KEY (slide_id)');
    }
}
