<?php 

namespace App\Models;

class Task {

    private ?int $id = null;
    private string $nazov;
    private string $stav;
    private string $priorita;

    public function __construct(string $nazov, string $stav, string $priorita){
        $this->nazov = $nazov;
        $this->stav = $stav;
        $this->priorita = $priorita;
    }



    public function getId() : ?int {
        return $this->id;
    }
    

    public function getNazov() : string {
        return $this->nazov;
    }

    public function getStav() : string {
        return $this->stav;
    }

    public function getPriorita() : string {
        return $this->priorita;
    }





    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function setNazov(string $nazov) : void {
        $this->nazov = $nazov;
    }

    public function setStav(string $stav) : void {
        $this->stav = $stav;
    }

    public function setPriorita(string $priorita) : void {
        $this->priorita = $priorita;
    }
}
