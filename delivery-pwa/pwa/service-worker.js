const CACHE_NAME = "delivery-pwa-cache-v1";

const urlsToCache = [
    "/delivery-pwa/",
    "/delivery-pwa/index.php",
    "/delivery-pwa/public/css/style.css",
    "/delivery-pwa/public/js/app.js",
    "/delivery-pwa/app/Views/auth/login.php"
];

// INSTALAÇÃO
self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache);
            })
    );
});

// ACTIVATION
self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.map(key => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        })
    );
});

// FETCH (OFFLINE FIRST)
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
    );
});