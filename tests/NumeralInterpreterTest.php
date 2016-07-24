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

		/**
		 * testWhenInterpreterInterpretsArabicToRomanInvalidArabicTypeExceptionThrown
		 * When the NumeralInterpreter's function arabicToRoman is given an object of an invalid type an
		 * exception is thrown.
		 */
		public function testWhenInterpreterInterpretsArabicToRomanInvalidArabicTypeExceptionThrown() {
			$romanNumeral = new RomanNumeral();
			$exceptionMessage = 'No exception thrown.';
			$isException = false;
			try {
				$romanNumeral->setValue('I');
				NumeralInterpreter::arabicToRoman($romanNumeral);
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		/**
		 * testWhenInterpreterInterpretsArabicToRomanOnUnsetArabicNumeralExceptionThrown
		 * When the NumeralInterpreter's arabicToRoman function is given an unset ArabicNumeral object an exception
		 * is thrown.
		 */
		public function testWhenInterpreterInterpretsArabicToRomanOnUnsetArabicNumeralExceptionThrown() {
			$arabicNumeral = new ArabicNumeral();
			$exceptionMessage = 'No exception thrown.';
			$isException = false;
			try {
				NumeralInterpreter::arabicToRoman($arabicNumeral);
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		/**
		 * testWhenInterpreterInterpretsValidArabicToRomanValidRomanIsReturned
		 * When the NumeralInterpreter's arabicToRoman function is given a valid RomanNumeral the
		 * corresponding ArabicNumeral is returned.
		 */
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

		/**
		 * testWhenInterpreterInterpretsRomanToArabicInvalidRomanTypeExceptionThrown
		 * When the NumeralInterpreter's romanToArabic function is given an object not of type RomanNumeral an
		 * exception is thrown.
		 */
		public function testWhenInterpreterInterpretsRomanToArabicInvalidRomanTypeExceptionThrown() {
			$arabicNumeral = new ArabicNumeral();
			$exceptionMessage = 'No exception thrown.';
			$isException = false;
			try {
				$arabicNumeral->setValue(1);
				NumeralInterpreter::romanToArabic($arabicNumeral);
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		/**
		 * testWhenInterpreterInterpretsRomanToArabicOnUnsetRomanNumeralExceptionThrown
		 * When the NumeralInterpreter's romanToArabic function is given an unset RomanNumeral object an
		 * exception is thrown.
		 */
		public function testWhenInterpreterInterpretsRomanToArabicOnUnsetRomanNumeralExceptionThrown() {
			$romanNumeral = new RomanNumeral();
			$exceptionMessage = 'No exception thrown.';
			$isException = false;
			try {
				NumeralInterpreter::romanToArabic($romanNumeral);
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		/**
		 * testWhenInterpreterInterpretsValidRomanToArabicValidArabicIsReturned
		 * When the NumeralInterpreter is given a valid RomanNumeral object the corresponding ArabicNumeral
		 * object is returned.
		 */
		public function testWhenInterpreterInterpretsValidRomanToArabicValidArabicIsReturned() {
			foreach ($this->arabicToRoman as $arabicNumeralValue => $romanNumeralValue) {
				try {
					$romanNumeral = new RomanNumeral();
					$romanNumeral->setValue($romanNumeralValue);
					$arabicNumeral = NumeralInterpreter::romanToArabic($romanNumeral);
					$this->assertEquals($arabicNumeralValue, $arabicNumeral->getValue(), 'The arabic numeral value "' . $arabicNumeral->getValue() . '" did not equal the expected "' . $arabicNumeralValue . '".');
				} catch (Exception $e) {
					$this->fail($e->getMessage());
				}
			}
		}
	}