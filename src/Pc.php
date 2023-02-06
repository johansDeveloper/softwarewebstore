<?php

require_once("Host.php");
require_once("Core.php");

class Pc extends Host {

    protected Core $program;

    /**
     * Test subroutine process metadata
     * * */
    function __construct() {
        parent::__construct();
        $this->main();
    }

    /*
      function __construct() {

      if (Host::check_host()) {

      if (parent::login("johans", "penerico")) {

      parent::__construct();
      $this->main();
      } else {
      echo parent::alert("credenciales incorrectas");
      }
      }
      }
     */

    protected function main(): void {

        $this->program = new Core();
        $this->program->processMetadata();
        $this->program->count_items();

        //parent::render();
    }

}
