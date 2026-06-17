<?php

namespace App\Repositories;

use PDO;
use PDOException;
use App\Models\Device;

class DeviceManager
{   
    private PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getDevices($statusFilter = null) : array
    {
        try {
                
            $zariadenia = [];

            if ($statusFilter !== null) {

                $sql = "SELECT * FROM devices WHERE status_id = :status_id";

                $stmt = $this->db->prepare($sql);

                $stmt->execute([":status_id" => $statusFilter]);
            } else {
                $sql = "SELECT * FROM devices";

                $stmt = $this->db->prepare($sql);
                
                $stmt->execute();

            }

            while ($row = $stmt->fetch()) {

                $device = new Device(
                    $row["inventory_number"],
                    $row["type"],
                    $row["brand"],
                    $row["model"],
                    $row["status_id"]
                );

                //nastavenie id

                $device->setId((int)$row["id"]);

                $zariadenia[] = $device;
            }

            return $zariadenia;

        } catch(PDOException $e) {

        return [];
        }
    }
}