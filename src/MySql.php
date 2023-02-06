
<?php




/**
 * 
 * TODO source code from network check for vulnerabilities
 * 
 * 
 * **/
class MySql {

    
    /* Inherited constants */
    const SERVERNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DBNAME = 'store_db';

    public $mysqli = null;
    public $sql;
    private $result = array();

    public function __construct() {
        $this->mysqli = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
    }

    public function connection_status($link) {

        return $link;
    }

    public function select($table, $rows = "*", $where = null) {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function update($table, $para = array(), $id) {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";

        $result = $this->mysqli->query($sql);
    }

}
