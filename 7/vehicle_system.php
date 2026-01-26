<?php
class Vehicle {
    protected $brand;
    protected $model;
    protected $year;

    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getDetails() {
        return "Brand: $this->brand, Model: $this->model, Year: $this->year";
    }
}

class Car extends Vehicle {
    private $doors;

    public function __construct($brand, $model, $year, $doors) {
        parent::__construct($brand, $model, $year);
        $this->doors = $doors;
    }

    public function getCarInfo() {
        return $this->getDetails() . ", Doors: $this->doors";
    }
}

class Motorcycle extends Vehicle {
    private $type;

    public function __construct($brand, $model, $year, $type) {
        parent::__construct($brand, $model, $year);
        $this->type = $type;
    }

    public function getMotorcycleInfo() {
        return $this->getDetails() . ", Type: $this->type";
    }
}
$car = new Car("Toyota", "Corolla", 2022, 4);
echo $car->getCarInfo();

echo "<br>";

$bike = new Motorcycle("Yamaha", "R15", 2021, "Sport");
echo $bike->getMotorcycleInfo();

?>
