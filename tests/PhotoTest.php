<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getPhoto.php";

class PhotoTest extends TestCase{


 function testGetPhoto(){
	//test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
	//To test for non-empty output, I believe the following should do
	$this->expectOutputRegex('/./');
	$photo = new Photos;
	$json = $photo->getPhotos();
 }

}


?>
