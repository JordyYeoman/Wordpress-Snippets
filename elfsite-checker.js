	// Wait for the element to appear
	waitForElementToDisplay(".eapps-facebook-feed-photos-container",function(){
		let x = document.querySelector('.eapps-facebook-feed-photos-container');
		let y = getComputedStyle(x);
		let defaultFbFeedImage = document.querySelector('.defaultFbFeedImage');
		let fbFeed = document.querySelector('#eapps-facebook-feed-1');
	

		if(y.visibility === 'hidden') {
			console.log('No image');
			defaultFbFeedImage.classList.add('active');
			fbFeed.classList.add('active');
		} else {
			console.log('Image is there... duh');
			defaultFbFeedImage.classList.remove('active');
			fbFeed.classList.remove('active');
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
