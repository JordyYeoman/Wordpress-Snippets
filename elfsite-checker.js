	// Look for the Photo Element, if visbility is hidden, resort to default image.
  
	waitForElementToDisplay(".eapps-facebook-feed-photos-container",function(){
  // What you want to execute after the element has been found
		let x = document.querySelector('.eapps-facebook-feed-photos-container');
		let y = getComputedStyle(x);
		if(y.visibility === 'hidden') {
			console.log('No image');
		} else {
			console.log('Image is there... duh');
		}
	},1000,9000);

	function waitForElementToDisplay(selector, callback, checkFrequencyInMs, timeoutInMs) {
	var startTimeInMs = Date.now();
	(function loopSearch() {
		if (document.querySelector(selector) != null) {
		callback();
		return;
		}
		else {
		setTimeout(function () {
			if (timeoutInMs && Date.now() - startTimeInMs > timeoutInMs)
			return;
			loopSearch();
		}, checkFrequencyInMs);
		}
	})();
	}
