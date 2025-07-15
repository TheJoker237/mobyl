/* 
 * Fichier de configuration CDN avec fallbacks locaux
 * À utiliser si les CDN ne sont pas disponibles
 */

// Vérification jQuery
if (typeof jQuery === 'undefined') {
    document.write('<script src="js/vendor/jquery-3.6.0.min.js"><\/script>');
}

// Vérification Bootstrap
if (typeof bootstrap === 'undefined') {
    document.write('<script src="js/bootstrap.min.js"><\/script>');
}

// Vérification Swiper
if (typeof Swiper === 'undefined') {
    document.write('<script src="js/swiper.min.js"><\/script>');
}
