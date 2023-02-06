<?php

require_once("MySql.php");

/**
 *  
 * @abstract
 * @author Johans Caicedo
 */
class Core {

    protected MySql $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    /**  @var \array   *** */
    protected function create_informe($data = array()) {


        $query = "INSERT INTO `store_datamining` (`id`, `client_by_day`, `client_by_month`, `id_store`, `egresos_insumos`, `ventas_by_day`, `ventas_by_month`) "
                . "VALUES (?,?,?,?,?,?)";

        $size = 100;

        if (count($data) > 0) {
            $size = count($data);
        }

        for ($index = 0; $index < $size; $index++) {

            $res = mysqli_query($this->mysql->conn, $query);
            if (!$res) {
                throw new Exception("Error create inform");
            }
        }
    }

    /**
     * 
     *  @param int $clientes Numero de clientes actual en el registro de ingreso int|0 
     *  @return int|0 
     */
    protected static function calcula_cambio_clientes(int $clientes): int {
        $update = 0;

        if ($clientes <= 0)
            $update = rand(4, 9);


        if ($clientes > 100)
            $update = rand($clientes, 100);

        /*         * **
         * 
         *   $adjust_based_on_table = cambio promedio de n puntos
         * 
         * 
         * ** */

        if ($clientes < 3)
        //$update = rand ($adjust_based_on_table, 100);
            $update = rand(4, 100);

        return $update;
    }

    /*     * *
     * TODO: Obtener el dato de una fuente actulizada ejemplo site internet
     *              Habilitar la funcion manualmente
     *   
     *  TODO: Consultar tabla de cambios por injflacion que contenga intervalos
     *              apropiados
     *        
     * ** */

    protected static function calcula_cambio_ingreso(int $ingreso): int {

        $update = 0;

        if ($ingreso <= 0)
            $update = rand(4, 9);


        if ($ingreso > 100)
            $update = rand($ingreso, 100);

        /*         * **
         * 
         *   $adjust_based_on_table = cambio promedio de n puntos
         * 
         * 
         * ** */

        if ($ingreso < 3)
        //$update = rand ($adjust_based_on_table, 100);
            $update = rand(4, 100);

        return $update;
    }

    protected static function calcula_cambio_egreso(int $egreso): int {

        $update = 0;

        if ($egreso <= 0)
            $update = rand(4, 9);


        if ($egreso > 100)
            $update = rand($egreso, 100);

        /*         * **
         * 
         *   $adjust_based_on_table = cambio promedio de n puntos
         * 
         * 
         * ** */

        if ($egreso < 3)
        //$update = rand ($adjust_based_on_table, 100);
            $update = rand(4, 100);

        return $update;
    }

    public function simulate_clients(): bool {
        $code = false;
        $tmp_clients = 0;

        $query = "SELECT id, client_by_day FROM store_datamining";
        $res = mysqli_query($this->con, $query);

        while ($row = mysql_fetch_object($res)) {

            $tmp_clients = $row["client_by_day"];
            $id = $row["id"];

            $tmp_clients = Core::calcula_cambio_clientes($tmp_clients);

            $sql = "UPDATE store_datamining SET client_by_day='$tmp_clients' WHERE id=$id";
            $res = mysqli_query($this->mysql->conn, $sql);

            if ($res) {
                $code = true;
            }
        }
        return $code;
    }

    public function simulate_ingresos(): bool {

        $code = false;
        $tmp_ingreso = 0;

        $query = "SELECT id, ventas_by_day FROM store_datamining";
        $res = mysqli_query($this->con, $query);

        while ($row = mysql_fetch_object($res)) {

            $tmp_ingreso = $row["ventas_by_day"];
            $id = $row["id"];

            $tmp_ingreso = Core::calcula_cambio_ingreso($tmp_ingreso);

            $sql = "UPDATE store_datamining SET ventas_by_day='$tmp_ingreso' WHERE id=$id";
            $res = mysqli_query($this->mysql->conn, $sql);

            if ($res) {
                $code = true;
            }
        }
        return $code;
    }

    public function simulate_egresos(): bool {

        $code = false;
        $tmp_egreso = 0;

        $query = "SELECT id, egresos_insumos FROM store_datamining";
        $res = mysqli_query($this->con, $query);

        while ($row = mysql_fetch_object($res)) {

            $tmp_egreso = $row["egresos_insumos"];
            $id = $row["id"];

            $tmp_egreso = Core::calcula_cambio_egreso($tmp_egreso);

            $sql = "UPDATE store_datamining SET egresos_insumos='$tmp_egreso' WHERE id=$id";
            $res = mysqli_query($this->mysql->conn, $sql);

            if ($res) {
                $code = true;
            }
        }
        return $code;
    }

}
