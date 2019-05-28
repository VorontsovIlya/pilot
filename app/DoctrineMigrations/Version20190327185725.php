<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327185725 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_music_route` (`music_id` INT NOT NULL, `route_id` INT NOT NULL, INDEX IDX_AE8B527DCF532C18 (`music_id`), INDEX IDX_AE8B527D2895D84 (`route_id`), PRIMARY KEY(`music_id`, `route_id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_music_route` ADD CONSTRAINT FK_AE8B527DCF532C18 FOREIGN KEY (`music_id`) REFERENCES `pilot_Music` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `pilot_music_route` ADD CONSTRAINT FK_AE8B527D2895D84 FOREIGN KEY (`route_id`) REFERENCES `pilot_orm_routes` (`id`) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_music_route`');
    }
}
