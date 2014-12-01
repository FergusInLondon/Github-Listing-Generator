/*
** Randomise.js - Fergus Morrow <fergus@fergus-morrow.com>
**
** A quick'n'dirty jQuery plugin for applying a random class
**  to a given element.
*/

;(function ( $, window, document, undefined ) {

	var defaults = {
		classes				: [
				'one',
				'two',
				'three'
			],
		repeatRandomisation : true
	};
	
	function randomClasses ( element, options ) {
		this.element = element;
		this.settings = $.extend( {}, defaults , options );
		this._defaults = defaults;
		this._name = "randomClasses";
		this.init();
	}

	randomClasses.prototype = {
		init: function () {       
			var classes = this.randomise( this.settings.classes ),
				_self = this,
				i = 0;

			jQuery( this.element ).each(function(){
				jQuery(this).addClass( classes[i] );
				i++;
			
				if( i == classes.length ){
					if( _self.settings.repeatRandomisation ){
						classes = _self.randomise( classes );                
					}
					i = 0;
				}
			});
		},

		randomise: function ( classes ) {
			var random = [];
		  
			do{
				var indice = Math.floor( Math.random() * (classes.length) );
				var element = classes.splice( indice , 1 );
			
				random.push( element[0] );
			}while( classes.length > 0 );

			return random;
		}
	};

	$.fn["randomClasses"] = function ( options ) {
		return $.data( this, "plugin_randomClasses", new randomClasses( this, options ) );
	};
})( jQuery, window, document );
