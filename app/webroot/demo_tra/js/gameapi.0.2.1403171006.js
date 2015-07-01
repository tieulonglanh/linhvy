// CONFIG VARIABLES
// ***********************************************

var _logging = false; // set to false to disable logging


// EVENT LISTENERS
// ***********************************************

 /* Events that are available are:
 *
 *		- ready
 *		- playButtonClicked
 *		- loginProcessed
 *		- registrationProcessed
 *		- playerStatusChecked
 *		- playRegistered
 *		- spinButtonClicked
 *		- playAgainButtonClicked
 */



 /*
 *	DOM LOADED (jQuery: ready)
 *
 *	Raised when the page load completed
 */
	 $(document).ready(function() {
	  // initialise the output console
	  // _showLogConsole();
	  log('API: Log output is active');
	 });


 /*
 *	'PLAY' BUTTON CLICKED (playButtonClicked)
 *
 *	Raised when the player clicks the play button
 */
	 $(document).on("playButtonClicked", function(event) {
		log('API: Event caught: '+event.type);
		log('API: Raising delegated event from API: playButtonClicked');
			$.event.trigger({
				type: "showRegistrationForm"
			});
	 });

 /*
 *	LOGIN FORM PROCESSED (loginProcessed)
 *
 *	Raised when the login processes has completed
 *	The .PLAYER property should be populated with a
 *	unique reference to this current player
 */
	 $(document).on("loginProcessed", function(event, player) {
		log('API: Event caught: '+event.type+' - player: '+player);
		log('API: Check the status of the player');
		_checkPlayer(player);
	 });


 /*
 *	PLAY AGAIN BUTTON PRESSED (playAgainButtonClicked)
 *
 *	Raised when the PlayAgain button has been pressed
 *	The .PLAYER property should be populated with a
 *	unique reference to this current player
 */
	 $(document).on("playAgainButtonClicked", function(event) {
		log('API: Event caught: '+event.type+' - player: '+event.player);
		log('API: Check the status of the player');
		_checkPlayer(event.player);
	 });


 /*
 *	PLAYER STATUS CHECKED (playerStatusChecked)
 *
 *	Raised when the player handle is checked
 *	The .PLAYER property should be populated with a
 *	unique reference to this current player
 *	The .STATUS property should be populated with
 *	'okay|finished|error'
 */
	 $(document).on("playerStatusChecked", function(event) {
		log('API: Event caught: '+event.type+' - player: '+event.player+' - status: '+event.status);

		//mandy - updated to allow js to decide what to do next rather than API for flexibility
		//var gameObj = document.getElementById('find-teapot-2');
		//gameObj.game(event.player, event.status, event.numberOfPlays);

		// decide what to do now that the status has been checked

		/* Sam update - 22/04/2012 17:47
		*
		* There is no reason why we need to filter the result here, Colin.
		* Instead, you can pass back akll the data and let the Flash decide what to do next:
		*
		* The event params are:
		*
		*	{ type: "playerStatusChecked",
		*		player: json.player,
		*		status: json.status,
		*		numberOfPlays: json.numberOfPlays
		*	}
		*
		* so you can passback all these by using a function call like this:
		*
		* flashObj.gameFinished(event.player, event.status, event.numberOfPlays);
		*/


		/* Mandy update 27.01.2014 - old flash calls - poss to be used for IE8 */
		
		if(document.getElementById("find-the-teapot-flash")){
		    switch(event.status)
		 	{
				case 'okay':
					log('API: Call the SWF to play the game');

					/* Sam update - 22/04/2012 17:47
					*
					* hard-coded value replaced with param from raised event */
					

					// var _playNumber = 1;

					var _playNumber = event.numberOfPlays;
					var flashObj = document.getElementById('find-the-teapot-flash');
					flashObj.playGame(event.player, _playNumber);
					break;
				//Colin update - 22/04/2012 15:43
				case 'finished':
				case 'error':
					log('API: Call the SWF for game');
					var _playNumber = 1;
					var flashObj = document.getElementById('find-the-teapot-flash');
					flashObj.gameFinished(event.player);
					break;
			 }
		}
		
	 });


 /*
 *	REGISTRATION FORM PROCESSED (registrationProcessed)
 *
 *	Raised when the login processes has completed
 *	The .PLAYER property should be populated with a
 *	unique reference to this current player
 */
	 $(document).on("registrationProcessed", function(event, player) {
		log('API: Event caught: '+event.type+' - player: '+player);

		log('API: Check the status of the player');
		_checkPlayer(player);
	 });


 /*
 *	'SPIN' BUTTON CLICKED (spinButtonClicked)
 *
 *	Raised when the player clicks the spin button
 */
	 $(document).on("spinButtonClicked", function(event) {
		log('API: Event caught: '+event.type);

		log('API: Call _registerPlay('+event.player+')');
		_registerPlay(event.player);
	 });


 /*
 *	PLAY HAS BEEN REGISTERED (playRegistered)
 *
 *	Raised when server confirms a play has been registered
 *	The .PLAYER property should be populated with a
 *	unique reference to this current player
 *	The .STATUS property should be populated with
 *	'okay|finished|error'
 */
	 $(document).on("playRegistered", function(event) {
		log('API: Event caught: '+event.type);

		log('API: Call _registerPlay('+event.player+')');
		if(document.getElementById("find-the-teapot-flash")){
			var flashObj = document.getElementById('find-the-teapot-flash');
			flashObj.displayResult(event.player, event.status);
		}
		
	 });


// SWF CALl FUNCTIONS
// ***********************************************

	// Listener (and dispatcher) for all events raised by the SWF game
	function swfEventListener(event, params) {
		log('API: SWF Event caught: '+event);

		if (params) {
			log('API: SWF params are:'+params);
			log('API: parsing JSON params');
			var jsonParams = $.parseJSON(params);
		}

		switch(event)
		{
		case 'playButtonClicked':
			log('API: Raising delegated event from SWF: playButtonClicked');
			$.event.trigger({
				type: "playButtonClicked"
			});

			break;
		case 'spinButtonClicked':
			log('API: Raising delegated event from SWF: spinButtonClicked');
			$.event.trigger({
				type: event,
				player: jsonParams.player
			});
			break;

		case 'playAgainButtonClicked':
			log('API: Raising delegated event from SWF: playAgainButtonClicked');
			$.event.trigger({
				type: event,
				player: jsonParams.player
			});
			break;

		}
	}


// SERVER CALL FUNCTIONS
// ***********************************************

	// register that the player has played
	function _registerPlay(player) {
		// We are going to register the current player play with the server.
		// There can be 4 possible status' returned:
		// 1. win - player has won!
		// 2. continue - not won but has more plays left today
		// 3. lose - player has lost
		// 4. error - player not found or play not registered
		$.getJSON( "/v5/gameapi.php?action=registerPlay", { player: player } )
			.done( function( json ) {
				log('API: _registerPlay returned: player: '+json.player+' , status: '+json.status);
				log( "API: Raise event: playRegistered" );
				$.event.trigger({
					type: "playRegistered",
					player: json.player,
					status: json.status
				});
			})
			.fail( function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				log( "API: _registerPlay Request Failed: " + err);
			});
	}

	 // Check the player's credentials on the server
	 function _checkPlayer(player) {
		// We are going to check the player with the server.
		// There can be 3 possible status':
		// 1. okay - player is valid to play
		// 2. finished - player has used all plays
		// 3. error - player not found
		$.getJSON( "/v5/gameapi.php?action=checkPlayer", { player: player } )
			.done( function( json ) {
				log('API: checkPlayer returned: player: '+json.player+' , status: '+json.status+' , no. of plays: '+json.numberOfPlays);
				log( "API: Raise event: playerStatusChecked" );
				$.event.trigger({
					type: "playerStatusChecked",
					player: json.player,
					status: json.status,
					numberOfPlays: json.numberOfPlays
				});
			})
			.fail( function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				log( "API: checkPlayer Request Failed: " + err);
			});
	 }


// UTILITY FUNCTIONS
// ***********************************************

	// add the console UI element to the bottom of the DOM if needed
	function _showLogConsole() {
		if(_logging) {
		  $('body').append( "<ol id='console-box' reversed='reversed' />");
		}
	}
	function log(msg) {
		if(_logging) {
			// $('#console-box').prepend('<li>'+msg+'</li>');
			console.log(msg);
		}
	}
