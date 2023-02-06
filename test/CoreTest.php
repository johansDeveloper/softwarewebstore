<?php

require_once '../src/Core.php';

/**
 * @abstract 
 *
 * @author JohansCaicedo
 */
class CoreTest {

    private function coreInstanceProvider(): Object {

        class kernel extends Core {

            public function __getDay() {
                return $this->day;
            }

        }

        return $kernel = new Kernel();
    }

    public function loadDateTest(): void {

        $instance = $this->coreInstanceProvider();

        $instance->getDay();
    }

}
