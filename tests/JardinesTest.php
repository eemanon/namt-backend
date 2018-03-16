<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getJardines.php";

class JardinesTest extends TestCase{


 function testGetJardines(){
	//test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
	//To test for non-empty output, I believe the following should do
	$this->expectOutputRegex('/./');
	$jardines = new Jardines;
	$json = $jardines->getJardines();
 }


}


?>
