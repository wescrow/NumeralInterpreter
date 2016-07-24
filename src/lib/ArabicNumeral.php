<?php

	/**
	 * Class ArabicNumeral
	 */
	class ArabicNumeral {

		/**
		 * The value of the object.
		 * @var $value null
		 */
		private $value = null;

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

		/**
		 * getValue
		 * This function returns the set value of the object.
		 * @return integer The value of the ArabicNumeral object
		 * @throws Exception Throws exception if the value of the object has yet to be set.
		 */
		public function getValue() {

			if (is_null($this->value)) {
				throw new Exception('The value for this Arabic Numeral has not been set.');
			} else {
				return $this->value;
			}
		}
	}