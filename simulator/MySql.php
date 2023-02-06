<?php

/**
 * 
 * @abstract
 * 
 * <p>DATAMINING:  </p>
 *  Espacios en memoria que se asignaran al recuperar cierto dato relevante de un campo 
 * en la tabla de persistencia.
 * 
 * Ejemplo:
 *          $num_clients: Numero de clientes por dia, es una campo relevante y requiere proce-
 *                               samiento al ser recuperado de la tabla.
 * 
 *         Con este dato se construye una "Matriz de comportamiento de los calientes jejeje"
 *         $clients_by_year = array("enero"=>100, "febrero"=>85);     
 *              
 *  Datos identificados que posibilitarian un minado de datos provechoso
 * 
 *  $clients_by_day;  control de ingresos dinero en efectivo por ventas de productos o servicios
 * 
 * TODO: 
 *  Tener en cuenta los valores agregados que se tienen en cuenta o que representan 
 *            un cambio en el resultado de la optimizacion y rediseño en el uso de recursos del
 *            cliente 
 * Ejemplo: Escalable
 * 
 *      $descuento_por_: Clientes con opciones de pago adaptables, uso de puntos, compras, 
 *                                  etc
 * 
 * 
 * 
 * @author Johans Caicedo
 */
class MySql {

    const SERVERNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DBNAME = 'store_db';

    public $conn;

    function __construct() {
        $this->conn = mysqli_connect(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);

        if (mysqli_connect_error()) {
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    public function read_table(string $table) {

        $sql = "SELECT * FROM $table";
        $res = mysqli_query($this->con, $sql);

        return $res;
    }

    public function get_values($data = array()): void {

        while ($row = mysql_fetch_object($data)) {
            echo $row->id;
        }
    }

    public function write_Table($data = array()): bool {
        
    }

    /*     * * 
     * 
     * DATAMINING
     * 
     * Obtener el total de clientes del dia actual 
     * Este input proviene del registro o control de una caja registradora,
     *  misma que funciona y hace las veces de herramienta de auditoria...
     *  
     *  * */



    /*     * * 
     * 
     * DATAMINING
     * 
     * Obtener el total de clientes del mes actual 
     * 
     *  Este input proviene del registro o control de una caja registradora,
     *  misma que funciona y hace las veces de herramienta de auditoria...
     * 
     * TODO: 
     *             Escalable->     
     *          Tener en cuenta posibles formas de auditoria en otros tipos de rubros
     * 
     * * */


    /*     * * Obtener valor total de ingresos por ventas        
     * DATAMINING  
     * ** */




    /*     * * Obtener valor total de egresos por adquisicion de insumos      
     *  DATAMINING 
     * ** */

    public function insert_egresosBy_store(): object {


        return null;
    }

}
