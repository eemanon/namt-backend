<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getPseudo.php";
class PseudoTest extends TestCase{

  function testGetPseudo(){
    //test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
    //To test for non-empty output, I believe the following should do
    $this->expectOutputRegex('/./');
    $pseudo = new Pseudo;
    $json = $pseudo->getPseudo();
  }






}


?>
