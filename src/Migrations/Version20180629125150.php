<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180629125150 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job ADD job_contact_id INT NOT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F88DD6B557 FOREIGN KEY (job_contact_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F88DD6B557 ON job (job_contact_id)');
        $this->addSql('ALTER TABLE rent ADD rent_contact_id INT NOT NULL');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC4D438125 FOREIGN KEY (rent_contact_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2784DCC4D438125 ON rent (rent_contact_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F88DD6B557');
        $this->addSql('DROP INDEX IDX_FBD8E0F88DD6B557 ON job');
        $this->addSql('ALTER TABLE job DROP job_contact_id');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC4D438125');
        $this->addSql('DROP INDEX IDX_2784DCC4D438125 ON rent');
        $this->addSql('ALTER TABLE rent DROP rent_contact_id');
    }
}
