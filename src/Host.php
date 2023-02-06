<?php

require_once("WebPage.php");
require_once("MySql.php");
require_once("Core.php");

class Host {

    const DATABASE = 'store_db';

    public int $id;

    /**     * * * */
    protected string $ip;
    protected string $mac_address;
    protected string $operating_system;

    /*     * *ing software->   error de data structure -> diseño  pobre->analizar cast o alternativas al hacer set de este valor* */
    protected string $width;
    protected string $height;

    /*     * *   * */
    public WebPAge $webpage;

    function __construct() {
        $this->run();
    }

    protected function run(): void {
        $this->webpage = new WebPage();
        $this->mysql = new MySql();

        $this->operating_system = $this->getOperatingSystem();
        $this->ip = $this->getIpAddress();
        $this->mac_address = $this->getMacAddr();

        /*
         *   set dimensions to screen property 
         *   
         */
        $screen_props = $this->getScreenDimension();
        
        $this->setScreenDimensions($screen_props["width"],
                $screen_props["height"]);
    }

    public function alert(string $message): string {

        $page = file_get_contents("src/template.html");
        $script = "<script type='text/javascript'>            
        alert($message);            
        </script> ";
        $tmp = str_replace("#alert#", $script, $page);
        $page = $tmp;

        return $page;
    }

    public function loginform(): bool {

        $form = file_get_contents("loginForm.php");

        echo $form;

        return true;
    }

    public function login($uname, $psw): bool {


        $login = false;

        $host = "localhost"; /* Host name */
        $user = "root"; /* User */
        $password = ""; /* Password */
        $dbname = "login_profile"; /* Database name */
        $conn = null;

        $con = mysqli_connect($host, $user, $password, $dbname);

        if (!$con) {
            $login = $conn;
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($uname != "" && $psw != "") {

            $sql_query = "select * from usuario where name='" . $uname . "' and clave='" . $psw . "'";
            $result = mysqli_query($con, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = mysqli_num_rows($result);
            //$count = $row["id"];

            if ($count == 1) {
                $login = true;
                $_SESSION['name'] = $uname;
                //header('Location: home.php');
            } else {
                echo "Invalid username and password";
            }
        }


        return $login;
    }

    protected function getMacAddr(): string {

        $mac_addr = exec('getmac');
        $mac_addr = strtok($mac_addr, ' ');

        return $mac_addr;
    }

    protected function getIpAddress(): string {

        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function _ip_mac_address(): array {

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        $macCommandString = "arp " . $ipaddress . " | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";

        $mac = exec($macCommandString);

        return ['ip' => $ipaddress, 'mac' => $mac];
    }

    /*     * **
     * se prevee una solicitud de refactorizar en una iteracion posterior entonces
     * se realiza refactorizacion de  la funcion: el ide sugiere menos lineas por metodo segun conf?
     * el metodo aun realiza varias operaciones REFACTORIZAR
     * 
     *  realizar test case y diseño de prueba verificando la funcionalidad
     * con diversas maquinas de estado
     * *** */

    public function getOperatingSystem(): string {

        $operating_system = 'Unknown Operating System';
        $os_available = array("/linux/i",
            '/macintosh|mac os x|mac_powerpc/i',
            "/windows|win32|win98|win95|win16/i",
            "/ubuntu/i",
            "Ubuntu",
            "/iphone/i",
            "/ipod/i",
            "/ipad/i",
            '/android/i',
            '/blackberry/i',
            '/webos/i'
            );

        $u_agent = isset($_SERVER['
        HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        
        
        foreach ($os_available as $value) {
            $operating_system = $value ? $value : php_uname('s');
        }


        //Get the operating_system name
//        if ($u_agent) {
//            if (preg_match('/linux/i', $u_agent)) {
//                $operating_system = 'Linux';
//            } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
//                $operating_system = 'Mac';
//            } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
//                $operating_system = 'Windows';
//            } elseif (preg_match('/ubuntu/i', $u_agent)) {
//                $operating_system = 'Ubuntu';
//            } elseif (preg_match('/iphone/i', $u_agent)) {
//                $operating_system = 'IPhone';
//            } elseif (preg_match('/ipod/i', $u_agent)) {
//                $operating_system = 'IPod';
//            } elseif (preg_match('/ipad/i', $u_agent)) {
//                $operating_system = 'IPad';
//            } elseif (preg_match('/android/i', $u_agent)) {
//                $operating_system = 'Android';
//            } elseif (preg_match('/blackberry/i', $u_agent)) {
//                $operating_system = 'Blackberry';
//            } elseif (preg_match('/webos/i', $u_agent)) {
//                $operating_system = 'Mobile';
//            }
//        } else {
//            $operating_system = php_uname('s');
//        }

        return $operating_system;
    }

    protected function setScreenDimensions(string $width, string $height): void {
        $this->width = $width;
        $this->height = $height;
    }

    protected function getScreenDimension(): array {

        $width = "<script>document.write(screen.width);</script>";
        $height = "<script>document.write(screen.height);</script>";

        return ["width" => $width, "height" => $height];
    }

    /**
     * 
     * * */
    public function render(): void {
        echo $this->webpage->setVisible();
    }

    public function getMetadata(): string {
        return $this->webPage->__get_metadata();
    }

    public static function checkHost(): bool {

        $success = false;
        /* verificacion de una conexion correcta con el servidor de base de datos */
        if (Host::checkConnServer()){
            $success = true;
        }
        /* verificacion  de la existencia de la base de datos */
        if (Host::checkDatabase()){
            $success = true;
        }
        /* Verificacion de conexion a internet */
        if (Host::checkNetwork()){
            $success = true;
        }
            
        return $success;
    }

    /**
     * @abstract This function verify if the connection to server:database is up
     * 
     * 
     * */
    public static function checkConnServer(): bool {

        $flag = false;

        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, self::DATABASE);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $flag = true;
        }
        //echo "Connected successfully";
        return $flag;
    }

    /**
     * @abstract  Verify if database is available 
     * 
     * 
     * * */
    public static function checkDatabase(): bool {

        $success = false;

        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

        if (!$conn->connect_error) {

            $query = "SHOW DATABASES";
            $response = mysqli_query($conn, $query);

            while ($fila = mysqli_fetch_assoc($response)) {
                if ($fila['Database'] === "store_db") {
                    $success = true;
                }
            }
        } else {
            die("Connection failed: " . $conn->connect_error);
        }

        return $success;
    }

    /**
     * 
     * @abstract Verifica el estado actual de la rec TCP/IP del host en ejecucion
     * 
     * 
     * se prevee una solicitud de refactorizar en una iteracion  entonces
     * se realiza refactorizacion de  la funcion: el ide sugiere menos lineas por metodo segun conf?
     * el metodo aun realiza varias operaciones REFACTORIZAR
     * 
     * realizar test case y diseño de prueba verificando la funcionalidad
     * con diversas maquinas de estado
     * 
     * 
     * *** */
    public static function checkNetwork(): bool {


        //0connect   1disconnect
        $success = false;
        $state_network = array(CONNECTION_NORMAL, CONNECTION_ABORTED, CONNECTION_TIMEOUT);
        $msg = "";

        foreach ($state_network as $value) {
            if (connection_status() == $value) {
                $msg = $value;
            }
        }
        if ($msg == CONNECTION_NORMAL) { //echo "CONNECTION_NORMAL";
            $success = true;
        }
        return $success;
    }

}
