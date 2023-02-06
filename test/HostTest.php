<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("../src/Host.php");

/**
 * Description of HostTest
 * 
 * @abstract Entity to test Host domain class and her subroutine
 * 
 * @author johans caicedo
 */
//class HostTest extends PHPUnit_Framework_TestCase {
final class HostTest extends TestCase {

    /**
     * @abstract  In this subroutine: Is test operating system return
     *                                                correctly
     * * */
    public function getOsTest(): void {

        $current = isset($_SERVER['
        HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

        $host = new Host();
        $expected = $host->getOperatingSystem();

        $this->assertSame($current, $expected);
    }

    /**
     * 
     * @abstract   Esta funcion testa la correcta verificacion
     *                     del estado de red en el host de turno
     * @test 
     * 
     * * */
    public function checkNetworkTest(): void {

        $host = new Host();
        $expect = connection_status();

        $current = $host->checkNetwork();

        $this->assertSame($current, $expect);
    }

    /*
      public function screenDimensionTest(): void {

      $host = new Host();
      $expect = $host->width;
      $current = 0;

      assertNotEquals($current, $expect);

      $this->assertThat(
      $expect,
      $this->logicalNot(
      $this->equalTo($current)
      )
      );
      } */

    public function screendimensiontest(): void {

        $phone = new Phone();
        $expected = $phone->__getWithScreen();
        $current = 0;

        assertNotEquals($current, $expected);
                
         $expected = $phone->__getHeightScreen();  
          assertNotEquals($current, $expected);
    }

}
