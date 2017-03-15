if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register('http://localhost/Timetable/js/firebase.sw.js').then(function(registration) {
			messaging.useServiceWorker(registration);
			// Registration was successful
	  		console.log('ServiceWorker registration successful with scope: ', registration.scope);
		}).catch(function(err) {
	  	// registration failed :(
	  	console.log('ServiceWorker registration failed: ', err);
		});
	});
}

// Initialize Firebase
var config = {
	apiKey: "AIzaSyBvtRYvi2H6b2P59DyTGJuL6_ML9ZZQL_w",
	authDomain: "timetable-1e943.firebaseapp.com",
	databaseURL: "https://timetable-1e943.firebaseio.com",
	storageBucket: "timetable-1e943.appspot.com",
	messagingSenderId: "1092864126054"
};
firebase.initializeApp(config);

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();
messaging.requestPermission()
.then(function() {
	console.log('Notification permission granted.');
	return messaging.getToken();
})
.then(function(token) {
	console.log(token);
})
.catch(function(err) {
	console.log('Unable to get permission to notify.', err);
});

messaging.onMessage(function(payload) {
	console.log('onMessage: ', payload);
});
