<?php

require_once("Host.php");
require_once("Core.php");
require_once("secure/Secure.php");

class Phone extends Host {

    protected Core $program;

    /*     * *
     *  
     * Test subroutine process metadata
     * * */

    function __construct() {

        //precondition to use the secure functions
        parent::__construct();

//        if (isset($_POST["refresh"]))        
//            Secure::whatchdog();

        $this->main();
    }

    /**
     *  error de diseño .... fetichischas 
     * verificar la visibilidad en domain class ...
     */
    public function __getWithScreen(): string {
        return$this->width;
    }

    /**
     * 
     * 
     * * */
    protected function setScreendimension(): void {
        parent::getScreenDimension();
    }

    public function __getHeightScreen(): string {

        return $this->height;
    }

    /*
      function __construct() {


      if (parent::login("johans", "")) {

      parent::__construct();
      $this->main();
      } else {
      echo parent::alert("credenciales incorrectas");
      }
      } */

    protected function main(): void {

        Secure::auditoryIp($this->ip);
        Secure::auditoryMacAddr($this->mac_address);
        // Secure::auditoryOS($this->operating_system);
        Secure::auditoryScreenProps($this->getScreenDimension());

        $this->program = new Core();
        $this->program->processMetadata();

        //parent::render();
    }

    protected function show_panel_suggestion(): string {

        $buffer = file_get_contents("src/panel_suggestion.php");

        return $buffer;
    }

}
