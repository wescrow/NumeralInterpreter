<?php

	require_once('ArabicNumeral.php');
	require_once('RomanNumeral.php');

	/**
	 * Class NumeralInterpreter
	 */
	class NumeralInterpreter {

		public function arabicToRoman(ArabicNumeral $arabicNumeral) {

			$arabicNumeralValue = null;
			try {
				$arabicNumeralValue = $arabicNumeral->getValue();
			} catch (Exception $e) {
				throw $e;
			}
		}
	}