
const staticAssets = [
	'/',
	'/css/styles.css',
	'/css/app.css',
	'/css/articleView.css',
	'/css/effects.css',
	'/css/menu_styles.css',
	'/js/app.js',
	'/js/effect.js',
	'/js/infiniteScroll.js',
	'/js/menuScript.js',
	'/js/searchfor_article.js',
	'/js/websocket.js'
];
var deferredPrompt;
self.addEventListener('beforeinstallprompt', async event =>{
	alert('Install');
	event.preventDefault();

	deferredPrompt = event;

	showInstallPromotion();
});

self.addEventListener('install', async event =>{
	const cache = await caches.open('gnewsly');
	cache.addAll(staticAssets);
	console.log('Service worker has been installed');
});

self.addEventListener('fetch',event=>{
	const req = event.request;
	// event.respondWith(cacheFirst(req));
	event.respondWith(
		caches.match(req).then(function(response){
			return response || fetch(req);
		})
		);
});

self.addEventListener('push', function(event) {
  console.log('[Service Worker] Push Received.');
  console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);

  const title = 'Gnewsly';
  const options = {
    body: event.data.text(),
    icon: 'img/icons/icon-72x72.png',
    badge: 'img/icons/icon-72x72.png'
  };

  event.waitUntil(self.registration.showNotification(title, options));
});
self.addEventListener('offline',function(event)
{
	console.log('this PWA is offline');
});

self.addEventListener('notificationclick', function(event) {
  console.log('[Service Worker] Notification click received.');

  event.notification.close();

  event.waitUntil(
    clients.openWindow('https://www.gnewsly.co.za')
  );
});
self.addEventListener('activate', function(event)
{
	event.waitUntil(self.clients.claim());
});
async function cacheFirst(req){
	const cachedResponse = await caches.match(req);
	return cachedResponse || fetch(req);
}
