<?php

/**
 * @abstract Custom exeption to module secure
 * 
 *
 * @author JohansCaicedo
 */
class SecureException extends Exception {

    public function __construct() {
        parent::__construct();
    }

    public function secureIpException() {
        
    }

}
