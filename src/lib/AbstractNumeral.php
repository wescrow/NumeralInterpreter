<?php

	/**
	 * Class AbstractNumeral
	 */
	abstract class AbstractNumeral {
		
		/**
		 * The value of the object.
		 * @var $value null
		 */
		protected $value = null;

		/**
		 * setValue
		 * Force child classes to implement a set value function.
		 * @param $input
		 */
		abstract public function setValue($input);

		/**
		 * getValue
		 * This function returns the set value of the object.
		 * @return integer The value of the child Numeral object
		 * @throws Exception Throws exception if the value of the object has yet to be set.
		 */
		public function getValue() {

			if (is_null($this->value)) {
				throw new Exception('The value for this Numeral has not been set.');
			} else {
				return $this->value;
			}
		}

	}