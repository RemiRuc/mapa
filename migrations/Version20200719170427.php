<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200719170427 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE journey (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lat DOUBLE PRECISION DEFAULT NULL, lng DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journey_map (journey_id INT NOT NULL, map_id INT NOT NULL, INDEX IDX_25A17768D5C9896F (journey_id), INDEX IDX_25A1776853C55F64 (map_id), PRIMARY KEY(journey_id, map_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, creator_id INT NOT NULL, name VARCHAR(255) NOT NULL, public TINYINT(1) NOT NULL, INDEX IDX_93ADAABB61220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pin (id INT AUTO_INCREMENT NOT NULL, journey_id INT DEFAULT NULL, map_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, day_passed INT NOT NULL, lat DOUBLE PRECISION DEFAULT NULL, lng DOUBLE PRECISION DEFAULT NULL, INDEX IDX_B5852DF3D5C9896F (journey_id), INDEX IDX_B5852DF353C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE journey_map ADD CONSTRAINT FK_25A17768D5C9896F FOREIGN KEY (journey_id) REFERENCES journey (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE journey_map ADD CONSTRAINT FK_25A1776853C55F64 FOREIGN KEY (map_id) REFERENCES map (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABB61220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pin ADD CONSTRAINT FK_B5852DF3D5C9896F FOREIGN KEY (journey_id) REFERENCES journey (id)');
        $this->addSql('ALTER TABLE pin ADD CONSTRAINT FK_B5852DF353C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journey_map DROP FOREIGN KEY FK_25A17768D5C9896F');
        $this->addSql('ALTER TABLE pin DROP FOREIGN KEY FK_B5852DF3D5C9896F');
        $this->addSql('ALTER TABLE journey_map DROP FOREIGN KEY FK_25A1776853C55F64');
        $this->addSql('ALTER TABLE pin DROP FOREIGN KEY FK_B5852DF353C55F64');
        $this->addSql('DROP TABLE journey');
        $this->addSql('DROP TABLE journey_map');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE pin');
    }
}
