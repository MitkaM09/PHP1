<?php

namespace App\Models;

class Device 
{
    private int $id;
    private string $inventory_number;
    private string $type;
    private string $brand;
    private string $model;
    private int $status_id;

    public function __construct(string $inventory_number, string $type, string $brand, string $model, int $status_id) 
    {
        $this->inventory_number = $inventory_number;
        $this->type = $type;
        $this->brand = $brand;
        $this->model = $model;
        $this->status_id = $status_id;
    }





    public function getId(): ?int { 
        return $this->id; 
    }

    public function getInventoryNumber(): string { 
        return $this->inventory_number; 
    }

    public function getType(): string { 
        return $this->type; 
    }

    public function getBrand(): string { 
        return $this->brand; 
    }

    public function getModel(): string { 
        return $this->model; 
    }

    public function getStatusId(): int { 
        return $this->status_id; 
    }

  public function getStatusText(): string 
{
    if ($this->status_id === 2) {

        return 'Nefunkčné';
        
    } else {

        return 'Funkčné';
    }
}



    public function setId(int $id): void 
    {
        $this->id = $id;
    }
}
?>