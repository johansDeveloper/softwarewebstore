<?php

require_once("src/Phone.php");
require_once("src/Pc.php");
require_once("src/Device.php");

require_once ('src/Core.php');



require_once("src/scriptPhone.php");
require_once("src/scriptPc.php");



$phone = new Phone();
//echo $phone->__getWithScreen();
//$pc = new Pc();

/*
  Phone();
  string page

 
do {
    $phone = new Phone();

    sleep(60);
} while (true);

do {

    $pc = new Pc();
    sleep(60);
} while (true);


  $device = new Device();

  $core = new Core();
  $core->main();
 * 
 */


