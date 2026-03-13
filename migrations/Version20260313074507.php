<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260313074507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE culture (id INT AUTO_INCREMENT NOT NULL, date_culture DATE NOT NULL, date_fin DATE NOT NULL, quantite_recolte INT NOT NULL, noparcelle_id INT NOT NULL, production_id INT NOT NULL, INDEX IDX_B6A99CEB8E133F9F (noparcelle_id), INDEX IDX_B6A99CEBECC6147F (production_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE epandre (id INT AUTO_INCREMENT NOT NULL, qteepandre INT NOT NULL, idengrais_id INT NOT NULL, noparcelle_id INT NOT NULL, date_id INT NOT NULL, INDEX IDX_5F64826F9B95527D (idengrais_id), INDEX IDX_5F64826F8E133F9F (noparcelle_id), INDEX IDX_5F64826FB897366B (date_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, valeur DOUBLE PRECISION NOT NULL, codeelement_id INT NOT NULL, idengrais_id INT NOT NULL, INDEX IDX_62EF7CBAFEC6F301 (codeelement_id), INDEX IDX_62EF7CBA9B95527D (idengrais_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE culture ADD CONSTRAINT FK_B6A99CEB8E133F9F FOREIGN KEY (noparcelle_id) REFERENCES parcelle (id)');
        $this->addSql('ALTER TABLE culture ADD CONSTRAINT FK_B6A99CEBECC6147F FOREIGN KEY (production_id) REFERENCES production (id)');
        $this->addSql('ALTER TABLE epandre ADD CONSTRAINT FK_5F64826F9B95527D FOREIGN KEY (idengrais_id) REFERENCES engrais (id)');
        $this->addSql('ALTER TABLE epandre ADD CONSTRAINT FK_5F64826F8E133F9F FOREIGN KEY (noparcelle_id) REFERENCES parcelle (id)');
        $this->addSql('ALTER TABLE epandre ADD CONSTRAINT FK_5F64826FB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBAFEC6F301 FOREIGN KEY (codeelement_id) REFERENCES elementschimiques (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA9B95527D FOREIGN KEY (idengrais_id) REFERENCES engrais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE culture DROP FOREIGN KEY FK_B6A99CEB8E133F9F');
        $this->addSql('ALTER TABLE culture DROP FOREIGN KEY FK_B6A99CEBECC6147F');
        $this->addSql('ALTER TABLE epandre DROP FOREIGN KEY FK_5F64826F9B95527D');
        $this->addSql('ALTER TABLE epandre DROP FOREIGN KEY FK_5F64826F8E133F9F');
        $this->addSql('ALTER TABLE epandre DROP FOREIGN KEY FK_5F64826FB897366B');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBAFEC6F301');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA9B95527D');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE epandre');
        $this->addSql('DROP TABLE posseder');
    }
}
