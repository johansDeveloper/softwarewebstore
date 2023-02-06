<?php

class Device extends Host {

    protected Core $program;
    protected string $type = "cpu";

    function __construct(string $type = null) {

        if ($type != null) {
            $this->__setTypeDevice($type);
        }

        if (parent::login("johans", "penerico")) {

            parent::__construct();
            $this->main();
        } else {
            echo "credenciales incorrectas";
        }
    }

    protected function __setTypeDevice(string $type): void {
        $this->type = $type;
    }

    protected function main(): void {
        $this->program = new Core();
        $this->program->processMetadata();
    }

}
