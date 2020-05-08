$(document).ready(function(){
    // Init ScrollMagic
    var controller = new ScrollMagic.Controller();
    //Build Scene
    var scene = new ScrollMagic.Scene({
							triggerElement: "#trigger1",
							triggerHook: 0.9, // show, when scrolled 10% into view
							duration: "80%", // hide 10% before exiting view (80% + 10% from bottom)
							offset: 50 // move trigger to center of element
						})
						.setClassToggle("#reveal1", "visible") // add class to reveal
						// .addIndicators() // add indicators (requires plugin)
						.addTo(controller);

    // build scenes
	var revealElements = document.getElementsByClassName("digit");
	for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
							triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
							offset: 80,												 // start a little later
							triggerHook: 0.9,
						})
						.setClassToggle(revealElements[i], "visible") // add class toggle
						// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
						.addTo(controller);
	}
    // build scene
		new ScrollMagic.Scene({
							triggerElement: "#trigger2",
							triggerHook: 0.9,
							offset: 50, // move trigger to center of element
							reverse: true // only do once
						})
						.setClassToggle("#reveal2", "visible") // add class toggle
						// .addIndicators() // add indicators (requires plugin)
						.addTo(controller);
});
