<?php

	require_once(__dir__ . '../../src/lib/RomanNumeral.php');

	/**
	 * Class RomanNumeralTest
	 * Class for testing the RomanNumeral library.
	 */
	class RomanNumeralTest extends \PHPUnit_Framework_TestCase {

		/**
		 * testWhenRomanNumeralIsPassedAValidRomanNumeralItReturnsTrue
		 * When the RomanNumeral object is passed a valid roman numeral into setValue it returns true.
		 */
		public function testWhenRomanNumeralIsPassedAValidRomanNumeralItReturnsTrue() {

			$validRomanNumerals = [
				'I', 'III', 'IX', 'MLXVI', 'MCMLXXXIX', 'CXXIII', 'MCMXCIX', 'CCV', 'CMLXXXVII',
				'MCCIX', 'MMCMIV', 'DCCLXXVII', 'CXII'
			];

			foreach ($validRomanNumerals as $validRomanNumeral) {
				$romanNumeral = new RomanNumeral();
				$isException = false;
				$exceptionMessage = "No exception thrown.";
				try {
					$romanNumeral->setValue($validRomanNumeral);
				} catch (Exception $e) {
					$isException = true;
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals(false, $isException, $exceptionMessage);
			}
		}

		/**
		 * testWhenRomanNumeralPassedInvalidRomanNumeralValueExceptionIsThrown
		 * When the RomanNumeral object is passed an invalid roman numeral into setValue an exception is thrown.
		 */
		public function testWhenRomanNumeralPassedInvalidRomanNumeralValueExceptionIsThrown() {

			$invalidRomanNumerals = [
				'.', '~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+',
			 	'{', '[', '}', ']', '\\', '|', ';', ':', '"', '\'', '<', ',', '>', '?', '/', '0',
			 	'1', '2', '3', '4', '5', '6', '7', '8', '9', 'IIII', 'XXXX', 'CCCC', 'MMMM', 'VV',
			 	'LL', 'DD', 'IIV', 'IIX', 'IL', 'XXL', 'XXC', 'XD', 'CCD', 'CCM', ' ', 'X I'
			];

			foreach ($invalidRomanNumerals as $invalidRomanNumeral) {
				$romanNumeral = new RomanNumeral();
				$isException = false;
				$exceptionMessage = "No exception thrown for invalid Roman Numeral '$invalidRomanNumeral'.";
				try {
					$romanNumeral->setValue($invalidRomanNumeral);
				} catch (Exception $e) {
					$isException = true;
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals(true, $isException, $exceptionMessage);
			}
		}

		/**
		 * testWhenRomanNumeralGetValueIsCalledBeforeSetValueExceptionIsThrown
		 * When a RomanNumeral object's getValue is called before it's setValue an exception is thrown.
		 */
		public function testWhenRomanNumeralGetValueIsCalledBeforeSetValueExceptionIsThrown() {

			$romanNumeral = new RomanNumeral();
			$isException = false;
			$exceptionMessage = "No exception thrown.";
			try {
				$romanNumeral->getValue();
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		/**
		 * testWhenRomanNumeralGetValueIsCalledAfterSetValueValueIsReturned
		 * When a RomanNumeral object's getValue is called after it's setValue the value is returned.
		 */
		public function testWhenRomanNumeralGetValueIsCalledAfterSetValueValueIsReturned() {

			$validRomanNumerals = [
				'I', 'III', 'IX', 'MLXVI', 'MCMLXXXIX', 'CXXIII', 'MCMXCIX', 'CCV', 'CMLXXXVII',
				'MCCIX', 'MMCMIV', 'DCCLXXVII', 'CXII'
			];

			foreach ($validRomanNumerals as $validRomanNumeral) {
				$romanNumeral = new RomanNumeral();
				$value = null;
				$exceptionMessage = "No exception thrown.";
				try {
					$romanNumeral->setValue($validRomanNumeral);
					$value = $romanNumeral->getValue();
				} catch (Exception $e) {
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals($validRomanNumeral, $value, $exceptionMessage);
			}
		}

	}