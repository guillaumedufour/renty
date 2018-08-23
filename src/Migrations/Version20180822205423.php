<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180822205423 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F86AE10762');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC5D42FF5E');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP INDEX IDX_FBD8E0F86AE10762 ON job');
        $this->addSql('ALTER TABLE job DROP job_place_id');
        $this->addSql('DROP INDEX IDX_2784DCC5D42FF5E ON rent');
        $this->addSql('ALTER TABLE rent DROP rent_place_id, DROP fk_postal_code_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD job_place_id INT NOT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F86AE10762 FOREIGN KEY (job_place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F86AE10762 ON job (job_place_id)');
        $this->addSql('ALTER TABLE rent ADD rent_place_id INT NOT NULL, ADD fk_postal_code_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC5D42FF5E FOREIGN KEY (rent_place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_2784DCC5D42FF5E ON rent (rent_place_id)');
    }
}
