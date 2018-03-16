<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getJardins.php";

class JardinsTest extends TestCase{



 function testGetJardins(){
	 //test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
	 //To test for non-empty output, I believe the following should do
	 $this->expectOutputRegex('/./');
	 $jardins = new Jardins;
	 $json = $jardins->getJardins();
 }

}


?>
