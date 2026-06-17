<?php 
session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Database;
use App\Repositories\TaskRepository;
use App\Models\Task;


$db = new Database();
$pdo = $db->spojenie();


$taskRepository = new TaskRepository($pdo);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $akcia = $_POST["akcia"] ?? '';



    if ($akcia == "pridat") {
        $nazov = $_POST["nazov"];
        $priorita = $_POST["priorita"];
        $predvolenyStav = "Na prejdenie";

        $novaUloha = new Task($nazov, $predvolenyStav, $priorita);
        $taskRepository->createTask($novaUloha);
    } 
    
    if ($akcia == "posun") {
        $id = (int)$_POST["id"];
        $novyStav = $_POST["novy_status"];
        
        $taskRepository->updateStatus($id, $novyStav);
    }
    

    header("Location: index.php");
    exit;
}


$vsetkyUlohy = $taskRepository->getAllTasks();

require_once __DIR__ . "/../view/tasks.php";