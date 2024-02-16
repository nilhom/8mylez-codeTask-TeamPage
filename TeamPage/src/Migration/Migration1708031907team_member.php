<?php declare(strict_types=1);

namespace TeamPage\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1708031907team_member extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1708031907;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE `team_member` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255),
    `job` VARCHAR(255),
    `picture` VARCHAR(255),
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
