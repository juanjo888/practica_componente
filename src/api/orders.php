<?php 

namespace Juanjo;

require_once 'connection_db.php';

class Orders extends ConnectionDB {


    public function insertOrder($date,$company,$qty ) {
        $result = $this->connect()->query("Insert into orders (date,company,qty) VALUES('$date', \"$company\",$qty)");

        return $result;
    }

    public function getAllOrders() {
        $result = $this->connect()->query("Select * from orders");
        return $result;
    }

    public function getAllOrdersFilterByCompany($company) {
        $result = $this->connect()->query("Select * from orders where company=\"$company\"");
        return $result;
    }

    public function getAllOrdersFilterByDate($date) {
        $result = $this->connect()->query("Select * from orders where date>'$date'");
        return $result;
    }

}
?>