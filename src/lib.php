<?php

const SERVERNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'store_db';

class lib {

    public function coreInstanceProvider(): Object {

        return new class {

            public function __getDay(): int {
                return 1;
            }
        };
    }

    public function loadDateTest(): void {

        $instance = $this->coreInstanceProvider();

        $instance->getDay();
    }

}

//function calcula_ganancia(int $clients, int $total): int {
//try{
//$ganancia = 0;
//$total / $clientes = $ganancia;
//catch   handle division by cero
//return $ganacia;
//}
//print_r(calcula_ganancia(2));

function calcula_ganancia(int $id): int {

    $ganancia = 0;

    $conn = new mysqli("localhost", "root", "", "store_db");

    $query = "SELECT * FROM `store_datamining` WHERE id=" . $id;
    //$query = "SELECT client_by_day, ventas_by_day FROM `store_datamining` WHERE id=" . $id;
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $ganancia = $row["ventas_by_day"] / $row["client_by_day"];
        }
    }

    return $ganancia;
}

function count_items(): void {
    date_default_timezone_set("America/New_York");

    if (date("h:i:sa") == "03:05:00am") {
        
    }
}

function count_stock(): void {
    date_default_timezone_set("America/New_York");

    if (date("h:i:sa") == "03:05:00am") {
        
    }
}

function count_clients(): void {
    date_default_timezone_set("America/New_York");

    if (date("h:i:sa") == "03:05:00am") {
        
    }
}

$path = "src/template.html";
$tmp = __DIR__ . "/template.html";
$dir = str_replace("\\", "/", $tmp);

//echo $dir;

$template = file_get_contents($dir);
$lst = explode("/", $path);

$dir = explode("/", $dir);

echo $lngt_a = count($dir);
echo $lngt_b = count($lst);

$cnt = 0;

$slct_arr1 = 0;
$slct_arr2 = 0;

if ($lngt_a > $lngt_b) {

    for ($index = 0; $index < $lngt_a; $index++) {

        if ($dir[$index] == $lst[$index]) {
            echo $dir[$index];
        }
    }
}

if ($lngt_b > $lngt_a) {

    for ($index = 0; $index < $lngt_b; $index++) {

        if ($lst[$index] == $dir[$index]) {
            echo $lst[$index];
        }
    }
}  

//require_once("Host.php");

//$host = new Host();
//$host->getOperatingSystem();



//Host::check_network();
//echo $host->get_operating_system();

/*
 * 

require_once("Phone.php");
 * 

echo $host->width;

$phone = new Phone();
echo $host->width;
  echo $host->getIpAddress();
  echo $host->mac_addr_win();
  echo Host::check_database(); 
  echo Host::check_host();*/



