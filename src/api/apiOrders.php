<?php 
namespace Juanjo;
require_once 'orders.php';
require '../../vendor/autoload.php';

use \PDO as PDO;

class ApiOrders {

    private $orders;


    public function __construct() {
        $this->orders= new Orders();
    }

    public function insertOrder($date,$company,$qty) {
       
        $result = $this->orders->insertOrder($date,$company,$qty);

        if($result->rowCount()>0) {
            http_response_code(201);
            echo json_encode(["HTTP_CODE" => "201","message" => "Request successful"]);
        }else {
            http_response_code(400);
            echo json_encode(["HTTP_CODE" => "400","message" => "Something when wrong"]);
        }
    }

    public function getAllOrders() {
        $resultGet = [];

        $result = $this->orders->getAllOrders();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($resultGet,$row);
        }
        http_response_code(200);
        echo json_encode($resultGet);
    }
    public function getAllOrdersFilteredByCompany($company) {
        $resultGet = [];

        $result = $this->orders->getAllOrdersFilterByCompany($company);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($resultGet,$row);
        }
        http_response_code(200);
        echo json_encode($resultGet);
    }

    public function getAllOrdersFilteredByDate($date) {
        $resultGet = [];
        $valores = explode('-',$date);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
            $result = $this->orders->getAllOrdersFilterByDate($date);
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                array_push($resultGet,$row);
            }
            http_response_code(200);
            echo json_encode($resultGet);
        }else {
            http_response_code(400);
            echo json_encode(["HTTP_CODE" => "400","message" => "Something when wrong"]);
        }
        
    }
}

$faker = \Faker\Factory::create();
$apiOrders = new ApiOrders();
if(isset($_GET['mode']) ) {
    if( $_GET['mode'] == 'insert') {
        for ($i=0; $i < 1000; $i++) { 
            $company = $faker->company();
            $apiOrders->insertOrder($faker->dateTimeBetween()->format("Y-m-d"),$company,$faker->numberBetween(1000,100000));
        }
    }else if($_GET['mode'] == 'show') {
        if(isset($_GET['company'])) {
        $apiOrders->getAllOrdersFilteredByCompany($_GET['company']);
        }else if(isset($_GET['date'])) {
            $apiOrders->getAllOrdersFilteredByDate($_GET['date']);
        }else {
            $apiOrders->getAllOrders();
        }
    }
}



?>
