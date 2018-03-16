<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getProfil.php";

class ProfilTest extends TestCase{

  function testGetProfil(){
    //test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
    //To test for non-empty output, I believe the following should do
    $this->expectOutputRegex('/./');
    $profil = new Profil;
    $json = $profil->getProfil();
  }

}


?>
