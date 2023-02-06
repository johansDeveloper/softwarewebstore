<?php

require_once( 'MySql.php');

class Core {

    protected int $day;
    protected int $month;
    protected int $year;
    
    protected MySQL $mysql;

    public function __construct() {
                
        $this->__setDate($this->__getDate());
    }

    public function count_items(): void {

        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "store_db";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result = $this->read_table("store");

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $name_store = $row["name_store"];
                    $stock = $row["stock"];
                    $items = $row["items"];
                    $clients = $row["puestos"];
                    $date = $row["date"];
                    $id_store = $row["id"];

                    $sql = "UPDATE comparision SET name_store='$name_store', stock='$stock', items='$items', clients='$clients', date='$date'";
                    $sql .= " WHERE id_store=" . $id_store;
                    $conn->query($sql);
                }
            }
        } catch (Exception $ex) {
            echo "" . $ex->getMessage();
        }
    }

    /*     * ****
     * 
     * 
     * @abstract This method list the stock from an store and return
     *                     
     * 
     * **** */

    public function count_stock(): void {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $this->read_table("store");

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $sql = "UPDATE comparision SET " . implode(',', $args);
                $sql .= " WHERE id_store=" . $row["id"];

                $conn->query($sql);
            }
        }
    }

    public function count_clients(): void {

        $this->mysql = new MySQL();
    }

    public function processMetadata(): void {

        $this->mysql = new MySQL();

        /*         * **    
         * TODO: Read and write database to update registers 
         * ** */
        $result = $this->read_table("store");

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                //echo "id: " . $row["id"] . " - Title: " . $row["title"] . " Name store:" . $row["name_store"] . "<br>";

                $row["puestos"] = rand(14, 40);
                $row["stock"] = $row["stock"] - rand(1, 4);

                //update records
                $this->write_table("store", $row, $row["id"]);
                /*                 * *                               RENDER                         ** */
                $this->main($row);
            }
        } else {
            echo "0 results";
        }


//        
        //     $result = $this->read_table("webpage");
//
//        if ($result->num_rows > 0) {
//            // output data of each row
//            while ($row = $result->fetch_assoc()) {
//                echo "id: " . $row["id"] . " - id store: " . $row["id_store"] . " visits:" . $row["visits"] . "<br>";
//            }
//        } else {
//            echo "0 results";
//        }
        //get the store order by date
        //get the store order by stock
        //get the place available
    }

    public function main($data = array()): void {


        $form = file_get_contents("src/login.php");
        $path = "src/template.html";
        $lines_string = file_get_contents($path);
        $lines_string = str_replace(" #formlogin# ", $form, $lines_string);

        $lines_string = str_replace("@date", $data["date"], $lines_string);
        $lines_string = str_replace("@items", $data["items"], $lines_string);
        $lines_string = str_replace("@stock", $data["stock"], $lines_string);
        $lines_string = str_replace("@puestos", $data["puestos"], $lines_string);
        $lines_string = str_replace("@tienda", $data["distStore"], $lines_string);
        $lines_string = str_replace("@franquicia", $data["distSame"], $lines_string);

        $content = "<tr>
                    <th scope='row'>1</th>      
                    <td>@date</td>                       
                    <td>@items</td>                       
                    <td>@stock</td>                       
                    <td>@puestos</td>                       
                    <td>@tienda</td>                       
                    <td>@franquicia</td>                       
                </tr>#new#";

        $lines_string = str_replace("#new#", $content, $lines_string);
        file_put_contents($path, $lines_string);
//        $run = true;
//        $cnt = 0;
//
//        do {
//
//            $path = "src/template.html";
//       
//            $lines_string = file_get_contents($path);
//       
//         
//            $lines_string = str_replace("#title#", "page titulo test", $lines_string);      
//            $lines_string = str_replace("#store_name#", "store name test", $lines_string);
//
//            if ($cnt == 3) {
//                file_put_contents($path, $lines_string . "#eof#");
//                $run = false;
//            } else {
//                $cnt = $cnt + 1;
//
//                /* if (str_contains($lines_string, "#eof#")) {
//                  $run = false;
//                  } */
//            }
//        } while ($run);
    }

    protected function write_table($table, $para = array(), $id) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $args = array();
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE id=" . "$id";

        return $result = $conn->query($sql);
    }

    protected function read_table(string $table) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT *  FROM $table";

        $result = $conn->query($sql);

        return $result;
    }

    protected function check_database(): bool {

        $success = false;

        if ($success) {
            
        }

        return $success;
    }

    protected function check_network(): bool {

        $success = false;

        switch (connection_status()) {
            case CONNECTION_NORMAL:
                $msg = 'You are connected to internet.';
                $success = true;
                break;
            case CONNECTION_ABORTED:
                $msg = 'No Internet connection';
                break;
            case CONNECTION_TIMEOUT:
                $msg = 'Connection time-out';
                break;
            case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
                $msg = 'No Internet and Connection time-out';
                break;
            default:
                $msg = 'Undefined state';
                break;
        }
        //display connection status
        echo $msg;

        return $success;
    }

    function get_operating_system(): string {
        $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $operating_system = 'Unknown Operating System';

        //Get the operating_system name
        if ($u_agent) {
            if (preg_match('/linux/i', $u_agent)) {
                $operating_system = 'Linux';
            } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
                $operating_system = 'Mac';
            } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
                $operating_system = 'Windows';
            } elseif (preg_match('/ubuntu/i', $u_agent)) {
                $operating_system = 'Ubuntu';
            } elseif (preg_match('/iphone/i', $u_agent)) {
                $operating_system = 'IPhone';
            } elseif (preg_match('/ipod/i', $u_agent)) {
                $operating_system = 'IPod';
            } elseif (preg_match('/ipad/i', $u_agent)) {
                $operating_system = 'IPad';
            } elseif (preg_match('/android/i', $u_agent)) {
                $operating_system = 'Android';
            } elseif (preg_match('/blackberry/i', $u_agent)) {
                $operating_system = 'Blackberry';
            } elseif (preg_match('/webos/i', $u_agent)) {
                $operating_system = 'Mobile';
            }
        } else {
            $operating_system = php_uname('s');
        }

        return $operating_system;
    }

    protected function __setDate($date): void {
        $this->day = $date["day"];
        $this->month = $date["month"];;
        $this->year = $date["year"];;
    }

    protected function __getDate(): array {
        
        return ["day" => date("d"), "month" => date("m"), "year"=>date("y")];
    }

}
