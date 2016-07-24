<?php

	require_once(__dir__ . '../../src/lib/NumeralInterpreter.php');

	/**
	 * Class NumeralInterpreter
	 * Class for testing the NumeralInterpreter library.
	 */
	class NumeralInterpreterTest extends \PHPUnit_Framework_TestCase {

		/**
		 * Test values to use
		 * @var array $arabicToRoman
		 */
		private $arabicToRoman = [
			1 => 'I',
			3 => 'III',
			9 => 'IX',
			1066 => 'MLXVI',
			1989 => 'MCMLXXXIX',
			1234 => 'MCCXXXIV',
			234 => 'CCXXXIV',
			34 => 'XXXIV',
			345 => 'CCCXLV',
			12 => 'XII',
			543 => 'DXLIII'
		];

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

		public function testWhenInterpreterInterpretsValidArabicToRomanValidRomanIsReturned() {

			foreach ($this->arabicToRoman as $arabicNumeralValue => $romanNumeralValue) {
				try {
					$arabicNumeral = new ArabicNumeral();
					$arabicNumeral->setValue($arabicNumeralValue);
					$romanNumeral = NumeralInterpreter::arabicToRoman($arabicNumeral);
					$this->assertEquals($romanNumeralValue, $romanNumeral->getValue(), 'The roman numeral value "' . $romanNumeral->getValue() . '" did not equal the expected "' . $romanNumeralValue . '".');
				} catch (Exception $e) {
					$this->fail($e->getMessage());
				}
			}
		}
	}
	
	