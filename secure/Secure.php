<?php

/**
 * @abstract
 * 
 *
 * @author Johans Caicedo
 */
class Secure {

    //put your code here


    public function __construct() {
        
    }
 
    public static function auditoryIp($ip): bool {

        $boolean = false;

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $addr = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $addr = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $addr = $_SERVER['REMOTE_ADDR'];
        }


        if ($addr === $ip) {
            $boolean = true;
        } else {
            throw new Exception("Tu modem te culio la infraestructura y los nomos");
        }

        return $boolean;
    }

    public static function auditoryMacAddr($mac): bool {

        $boolean = false;

        $mac_addr = exec('getmac');
        $mac_addr = strtok($mac_addr, ' ');

        if ($mac_addr == $mac) {
            $boolean = true;
        } else {
            throw new Exception("Tu modem te culio la infraestructura y los nomos");
        }

        return $boolean;
    }

    public static function auditoryOS($os): void {
        
        
        
    }

    public static function auditoryScreenProps($props): bool {

        $width = "<script>document.write(screen.width);</script>";
        $height = "<script>document.write(screen.height);</script>";

        if ($width == $props["width"] && $height == $props["height"]) {
            $boolean = true;
        } else {
            throw new Exception("Tu modem te culio la infraestructura y los nomos");
        }

        return $boolean;
    }

    public static function whatchdog(): void {

        while (true) {
            sleep(9);
            print_r(" subroutine secure ");
        }
    }

}
