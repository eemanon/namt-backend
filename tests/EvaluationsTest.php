<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getEvaluations.php";

class EvaluationsTest extends TestCase{

	function testGetEvaluations(){
		//test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
		//To test for non-empty output, I believe the following should do
		$this->expectOutputRegex('/./');
		$evals = new Evaluations;
		$json = $evals->getEvaluations();
	}


}


?>
