<?php

	/**
	 * Class ArabicNumeral
	 */
	class ArabicNumeral {

		private $value = null;

		public function setValue($input) {

			if (preg_match('/^[0-9]+$/', $input)) {
				$this->value = $input;
				return true;
			} else {
				throw new Exception("Input '$input' is not a valid value for an Arabic Numeral.");
			}
		}
		
		public function getValue() {

			if (is_null($this->value)) {
				throw new Exception('The value for this Arabic Numeral has not been set.');
			} else {
				return $this->value;
			}
		}
	}