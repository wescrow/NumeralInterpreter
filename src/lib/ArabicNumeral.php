<?php

	require_once('AbstractNumeral.php');

	/**
	 * Class ArabicNumeral
	 */
	class ArabicNumeral extends AbstractNumeral {

		/**
		 * setValue
		 * This function accepts a valid Arabic Numeral value for the object.
		 * @param $input The value attempting to be set
		 * @return bool True if the value was successfully set.
		 * @throws Exception Exception if the value was an invalid Arabic Numeral.
		 */
		public function setValue($input) {

			if (preg_match('/^[0-9]+$/', $input)) {
				$this->value = $input;
				return true;
			} else {
				throw new Exception("Input '$input' is not a valid value for an Arabic Numeral.");
			}
		}
	}