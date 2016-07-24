<?php

	require_once(__dir__ . '../../src/lib/NumeralInterpreter.php');

	/**
	 * Class NumeralInterpreter
	 * Class for testing the NumeralInterpreter library.
	 */
	class NumeralInterpreterTest extends \PHPUnit_Framework_TestCase {

		public function testWhenInterpreterInterpretsArabicToRomanInvalidArabicTypeExceptionThrown() {
			$romanNumeral = new RomanNumeral();
			$numeralInterpreter = new NumeralInterpreter();
			$exceptionMessage = 'No exception thrown.';
			$isException = false;
			try {
				$romanNumeral->setValue('I');
				$numeralInterpreter->arabicToRoman($roman);
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		public function testWhenInterpreterInterpretsArabicToRomanOnUnsetArabicNumeralExceptionThrown() {
			$arabicNumeral = new ArabicNumeral();
			$numeralInterpreter = new NumeralInterpreter();
			$exceptionMessage = 'No exception thrown.';
			$isException = false;
			try {
				$numeralInterpreter->arabicToRoman($arabicNumeral);
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}
	}