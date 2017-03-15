importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-messaging.js');

// Initialize Firebase
var config = {
	apiKey: "AIzaSyBvtRYvi2H6b2P59DyTGJuL6_ML9ZZQL_w",
	authDomain: "timetable-1e943.firebaseapp.com",
	databaseURL: "https://timetable-1e943.firebaseio.com",
	storageBucket: "timetable-1e943.appspot.com",
	messagingSenderId: "1092864126054"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
	const title = 'Hellow Wrlds';
	const options = {
		body: payload.data.status
	};
	return self.registration.showNotification(title, options);
});

/*
https://fcm.googleapis.com/fcm/send
Content-Type:application/json
Authorization:key=AIzaSyBvtRYvi2H6b2P59DyTGJuL6_ML9ZZQL_w

{ "data": {
    "score": "5x1",
    "time": "15:10"
  },
  "to" : "dPxYO8bxxvY:APA91bFNvMSRB-ins_dogqiQ-ppDAFrlB7oAlyTLsIkVFL2nNxaKOtq6mXWkSVwfXXoqf2AAz005GzT5ZrXCp1EkhzzMPamLAxemVBobLfTgQOZC_J_2JFWYALWLryJNwMfPMfh9lIyk"
}

*/