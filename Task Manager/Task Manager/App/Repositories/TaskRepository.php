<?php

namespace App\Repositories;


use PDO;

use PDOException;
use App\Models\Task;



class TaskRepository
{   
    private PDO $db;


    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAllTasks() : array
    {
        try {
                
            $ulohy = [];

            $sql = "SELECT * FROM tasks";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();


            while ($row = $stmt->fetch()) {

          
            $task = new Task(
                    $row["nazov"],
                    $row["stav"],
                    $row["priorita"]
                );

               
           
                $task->setId((int)$row["id"]);

                $ulohy[] = $task;
            }


            return $ulohy;

        } catch(PDOException $e) {

          
        return [];
        }
    }


    public function createTask(Task $task) : bool
    {
        try {

            $sql = "INSERT INTO tasks (nazov, stav, priorita)
    
    
                    VALUES (:nazov, :stav, :priorita)";

            $stmt = $this->db->prepare($sql);



            $result = $stmt->execute([
                ":nazov" => $task->getNazov(),
                ":stav" => $task->getStav(),
                ":priorita" => $task->getPriorita()
            ]);





            if($result) {

                $task->setId((int)$this->db->lastInsertId());
            }



            return $result;

        } catch(PDOException $e) {

            return false;
        }
    }


  

    public function updateStatus(int $id, string $stav) : bool
    {
     
    try {


            $sql = "UPDATE tasks 
                    SET stav = :stav 
               
                    WHERE id = :id";

            $stmt = $this->db->prepare($sql);



            $result = $stmt->execute([
                ":stav" => $stav,
                ":id" => $id
            ]);






            return $result;

        } catch(PDOException $e) {
        

            return false;
        }
    }
}