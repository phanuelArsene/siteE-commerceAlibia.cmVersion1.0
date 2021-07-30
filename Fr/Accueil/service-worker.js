const staticCacheName = "cache-V1";
const assest = [
  "/",
  "/Accueil/index.php",
  "/categories/index.php",
  "/categories/Article.php",
  "/compte/connexion.php",
  "/compte/inscription.php",
  "/produit/index.php",
  "/promotion/index.php",
  "/Propos/index.php",
  "/Service/index.php",
  "/surch/index.php",
  "/utilisateurs/amélioré.php",
  "/utilisateurs/index.php",
  "WebRoute/Css/styles.css",
];

//ajoue un fichier en cache
self.addEventListener("install", function (event) {
  event.waitUntil(
    caches.open(staticCacheName).then(function (cache) {
      return cache.addAll(assest);
    })
  );
});

self.addEventListener("fetch", function (event) {
  event.respondWith(
    caches.open(staticCacheName).then(function (cache) {
      return cache.match(event.request).then(function (response) {
        cache.addAll([event.request.url]);

        if (response) {
          return response;
        }

        return fetch(event.request);
      });
    })
  );
});
