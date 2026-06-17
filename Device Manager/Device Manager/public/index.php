<?php
session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Database;
use App\Repositories\DeviceManager;


$db = new Database();

$pdo = $db->spojenie();


$deviceManager = new DeviceManager($pdo);

$filterStatus = $_GET["status"] ?? "vsetko";

if ($filterStatus === "funkcne") {
        $zariadenia = $deviceManager->getDevices(1);


} elseif ($filterStatus === "nefunkcne") {
        $zariadenia = $deviceManager->getDevices(2);


} else {
        $zariadenia = $deviceManager->getDevices();
}


require_once __DIR__ . "/../view/devices.php";