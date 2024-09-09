<?php
namespace taller2\Models;
// crear modelo de contacts
class Client {
    private string $name;
    private string $phone;

    private string $date;

    private int $age;

    public function __construct(string $name, string $phone,string $date){ 
        $this->name = $name;
        $this->phone = $phone;
        $this->date = $date;
        $this->age = $this->calculateAge();
    }

    private function calculateAge(): int {
        $birthDate = new \DateTime($this->date);
        $currentDate = new \DateTime();
        $age = $currentDate->diff($birthDate);
        return $age->y;
    }
    public function getName(): string {
        return $this->name;
    }

    public function getPhone(): string {
        return $this->phone;
    }
    public function getDate(): string {
        return $this->date;
    }

    public function setName(string $name){
        $this->name = $name;
    }
    public function setPhone(string $phone){
        $this->phone = $phone;
    }
    public function setDate(string $date){
        $this->email = $date;
    }

    public function toArray() {
        return[
            'name' => $this->name,
            'phone' => $this->phone,
            'date' => $this->date,
            'age' => $this->age
        ];
    }
}