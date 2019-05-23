//////////////////////////////////////////////////////
//
// SCRIPTS - Inline head
//
//////////////////////////////////////////////////////




(function () {



	var 	win 			= window,
			doc 			= document,
			docElement 		= doc.documentElement,
			toast 			= win.toast;


	/*///////////////////////////////////////////////////////////////////////////////////////////////////////
		Global Namespaces
	*////////////////////////////////////////////////////////////////////////////////////////////////////////


	VOY = win.VOY || {};

	VOY.fn = VOY.fn || {};
	VOY.ui = VOY.ui || {},
	VOY.helpers = VOY.helpers || {},
	VOY.initial = VOY.initial || {};
	VOY.modules = VOY.modules || {},
	VOY.sections = VOY.sections || {},
	VOY.components = VOY.components || {},


	/*///////////////////////////////////////////////////////////////////////////////////////////////////////
		VOY functions
	*////////////////////////////////////////////////////////////////////////////////////////////////////////

	/*
		Custom Event: eventListener
		VOY.fn.listen('somethingLoad', function() {
			console.log('somethingLoad');
		});
	*/

	VOY.fn.listen = function(eventName, callback) {
		if (doc.addEventListener) {
			doc.addEventListener(eventName, callback, false);
		} else {
			docElement.attachEvent('onpropertychange', function(e) {
				if (e.propertyName == eventName) {
					callback();
				}
			});
		}
	};

	/*
		Custom Event: eventTrigger
		-> VOY.fn.trigger('somethingLoad');
	*/

	VOY.fn.trigger = function(eventName) {
		if (doc.createEvent) {
			var event = doc.createEvent('Event');
			event.initEvent(eventName, true, true);
			doc.dispatchEvent(event);
		} else {
			docElement[eventName] ++;
		}
	};



	/*///////////////////////////////////////////////////////////////////////////////////////////////////////
		VOY UI functions
	*////////////////////////////////////////////////////////////////////////////////////////////////////////

	/*
		Has touch support
		https://github.com/Modernizr/Modernizr/blob/master/feature-detects/touchevents.js
	*/

	VOY.ui.isTouch = function () {
		var docTouch = win.DocumentTouch;
		return win.hasOwnProperty('ontouchstart') || docTouch && doc instanceof docTouch || false;
	};

	if (VOY.ui.isTouch()) {
		var	docClass = docElement.className; // HTML tag
		// Replace class
		docElement.className = docClass.replace(/\bno-touch\b/g, 'touch');
	};



	/*///////////////////////////////////////////////////////////////////////////////////////////////////////
		VOY INITIAL
	*////////////////////////////////////////////////////////////////////////////////////////////////////////


	VOY.initial.loadASSET = function (name) {
			assetURL = name;
			toast('' + assetURL + '');
	};

	VOY.initial.loadCSS = function (name) {
			assetURL = name;
			toast('[css]'+assetURL);
	};


	VOY.initial.loadGoogleFONTS = function () {
			var fonta = win.getComputedStyle(document.body, ':after').getPropertyValue('content').replace(/"/g,"").replace(/'/g,"");
			var fontb = win.getComputedStyle(document.body, ':before').getPropertyValue('content').replace(/"/g,"").replace(/'/g,"");
			if (fonta.indexOf('https') !== -1) {
			   VOY.initial.loadCSS(fonta);
			}
			if (fontb.indexOf('https') !== -1) {
			   VOY.initial.loadCSS(fontb);
			}
	};

	VOY.initial.loadCoreJS = function (name) {
			assetURL = name;
			toast(
				'[js]'+assetURL+'',
				function() {
					VOY.fn.trigger('afterCoreJS');
				}
			);
	};

	//VOY.initial.loadCSS(VOY_PRESET.path.styles);

	// VOY.fn.listen('onVOYReady', function() {
	// 	VOY.initial.loadCoreJS(VOY_PRESET.path.scripts.VOY);
	// });



})();

// CONSOLE EVENT TRIGGERS

/*

	VOY.fn.listen('afterCoreJS', function() {
		 console.log('VOY -> afterCoreJS');
	});
	VOY.fn.listen('onVOYReady', function() {
		 console.log('VOY -> onVOYReady');
	});
*/
