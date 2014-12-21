<?php

return array(
	
	/**
	 * @var Github username
	 */
	'username' => 'fmorrow',
	
	/**
	 * @var array[] categories
	 */ 
	'categories' => [
		
		/**
		 * @var array category - Contains any additional meta-data associated with 
		 * 	the categories.
		 */
		'Web' => [
			'langs' => ["Javascript", "PHP"],
			'desc'	=> "Professionally, I spend my working hours writing enterprise level Object Oriented PHP code targetting the LAMP stack - although I also have experience working on modular architectures for front end development using systems such as RequireJS."
		],	// eof 'category'

		'Other' => [
			'langs' => ["Objective-C", "Java", "C"],
			'desc'	=> "In my spare time I also write C code targetting the Atmel AVR series of microcontrollers; (ala Arduino) as well as dabble in Java and Objective-C."
		]	// eof 'category'
	] // eof 'categories'

);
