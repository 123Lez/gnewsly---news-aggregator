/***************Firebase SDK**********************/

// Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyB49N4iOuHFNXJj4PzYuqGgvwUhx0bEHXA",
    authDomain: "gnewsly-push.firebaseapp.com",
    databaseURL: "https://gnewsly-push.firebaseio.com",
    projectId: "gnewsly-push",
    storageBucket: "gnewsly-push.appspot.com",
    messagingSenderId: "584228049309",
    appId: "1:584228049309:web:b2ec66f67b4a55fc981f74",
    measurementId: "G-Q8ZQVMSBCT"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

// console.log(firebase);
const messaging = firebase.messaging();
messaging.requestPermission()
.then(function(){
    console.log('Permission granted');
    // console.log(messaging.getToken());
})
.catch(function(err){
    console.log('Permission Denied', err);
})

messaging.getToken()
.then(function(token)
{
  $.ajax({
        type:'GET',
        url:'sendToken',
        data:{'user_token':token},
        success:function(data)
        {
          console.log(data);
        },
        error:function()
        {
          console.log('Failed to send token');
        }
  });
  console.log('Token: ',token);

})
.catch(function(err)
{
  console.log(console.log('failed to get token', err));
});

messaging.onMessage(function(payload){
    const title = 'Gnewsly';
    const options = {
        body: payload.data.body,
        icon: '../img/icons/icon-72x72.png',
        badge: '../img/icons/icon-72x72.png'
    };
    console.log('onMessage: ',payload);
    // return self.registration.showNotification(title,options);
    showNotification(title, payload);

});

window.addEventListener('online',handleConnection);
window.addEventListener('offline',handleConnection);

function handleConnection()
{
  if(navigator.onLine)
  {
      console.log('online');
  }
  else
  {
      console.log('no connectivity');
  }
  
}

const applicationServerPublicKey = 'BICiNYaNStciUsc1xLkj0gHbqd8XOqxnyuieOJCxKmfSeWZACse39Un44cSg7e9vdqg-aFDLxsngW8PQdVLRKJQ';
function urlB64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

var swRegistration;
if('serviceWorker' in navigator && 'PushManager' in window)
{

	navigator.serviceWorker.register('sw.js')
	.then(function(reg)
	{
	 console.log('Service Worker registered', reg) 
	 swRegistration = reg;
	 subscribeUser();
	})
	.catch(function(err)
	{
		console.log('registration failed', err)
	});


}

function subscribeUser()
{
	// unsubscribeUser();
	const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
	swRegistration.pushManager.subscribe({
	userVisibleOnly: true,
	applicationServerKey: applicationServerKey
	})
	.then(function(subscription) 
	{
	    console.log('User is subscribed.');

	    // updateSubscriptionOnServer(subscription);

	    isSubscribed = true;

	})
	.catch(function(error) 
	{
    	console.error('Failed to subscribe the user: ', error);
    });

}


function updateSubscriptionOnServer(subscription) {
  // TODO: Send subscription to application server

  // const subscriptionJson = document.querySelector('.js-subscription-json');
  // const subscriptionDetails =
  //   document.querySelector('.js-subscription-details');

  if (subscription) {
    subscriptionJson.textContent = JSON.stringify(subscription);
    subscriptionDetails.classList.remove('is-invisible');
  } else {
    subscriptionDetails.classList.add('is-invisible');
  }
}

function unsubscribeUser() {
  swRegistration.pushManager.getSubscription()
  .then(function(subscription) {
    if (subscription) {
      return subscription.unsubscribe();
    }
  })
  .catch(function(error) {
    console.log('Error unsubscribing', error);
  })
  .then(function() {
    // updateSubscriptionOnServer(null);

    console.log('User is unsubscribed.');
    isSubscribed = false;

    // updateBtn();
  });
}
function showNotification(title, payload) 
{
    navigator.serviceWorker.getRegistration()
    .then( function(reg){
        if(reg) 
        {
        return reg.showNotification(title, payload);
       } 
       else 
       {
         console.log('GOT undefined');
       }
    });
}