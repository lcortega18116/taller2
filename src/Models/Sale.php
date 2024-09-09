<?php
namespace taller2\Models;

// crear modelo de contacts
class Sale {
    private string $sale;
    private string $price;

    private float $iva;
    private string $date;

    private float $ivaRate = 0.19; 

    public function __construct(string $sale, string $price,string $date){ 
        $this->sale = $sale;
        $this->price = $price;
        $this->date = $date;
        $this->iva = $this->calculateIva($price);
    }

    private function calculateIva(float $price): float {
        return $price * $this->ivaRate;
    }

    public function getTotalPrice(): float {
        return $this->price + $this->iva;
    }

    public function getSale(): string {
        return $this->sale;
    }

    public function getPrice(): string {
        return $this->price;
    }
    public function getDate(): string {
        return $this->date;
    }

    public function getIva():float
    {
        return $this->iva;
    }

    public function setName(string $sale){
        $this->sale = $sale;
    }
    public function setPhone(string $price){
        $this->price = $price;
    }
    public function setDate(string $date){
        $this->email = $date;
    }
       
    public function toArray() {
        return[
            'sale' => $this->sale,
            'price' => $this->price,
            'iva' => $this->iva,
            'total_price' => $this->getTotalPrice(),
            'date' => $this->date,
        ];
    }
}