<?php

	require_once('ArabicNumeral.php');
	require_once('RomanNumeral.php');

	/**
	 * Class NumeralInterpreter
	 */
	class NumeralInterpreter {

		/**
		 * Roman numerals by their Arabic value.
		 * @var array
		 */
		static $romanNumerals = [
			'M'  => 1000,
			'CM' => 900,
			'D'  => 500,
			'CD' => 400,
			'C'  => 100,
			'XC' => 90,
			'L'  => 50,
			'XL' => 40,
			'X'  => 10,
			'IX' => 9,
			'V'  => 5,
			'IV' => 4,
			'I'  => 1
		];

		public function arabicToRoman(ArabicNumeral $arabicNumeral) {

			// Make sure that the ArabicNumeral has been set
			$tempArabic = null;
			try {
				$tempArabic = $arabicNumeral->getValue();
			} catch (Exception $e) {
				throw $e;
			}

			// Build Roman Numeral String
			$romanValue = '';
			foreach (self::$romanNumerals as $rn => $an) {

				// How many times will the roman numeral repeat?
				$repeat = $tempArabic / $an;
				$romanValue .= str_repeat($rn, $repeat);

				// Remove the found value from the temporary arabic numeral
				$tempArabic = $tempArabic % $an;
			}

			// Build the RomanNumeral object from our results
			try {
				$roman = new RomanNumeral();
				$roman->setValue($romanValue);
				return $roman;
			} catch (Exception $e) {
				throw $e;
			}
		}

		public function romanToArabic(RomanNumeral $romanNumeral) {

			// Make sure that the RomanNumeral has been set
			$tempRoman = null;
			try {
				$tempRoman = $romanNumeral->getValue();
			} catch (Exception $e) {
				throw $e;
			}
		}
	}