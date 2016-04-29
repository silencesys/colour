// Check if fonts are loaded
var proxima_nova_soft = new FontFaceObserver('proxima-nova-soft');

Promise.all([proxima_nova_soft.load()], 100000).then(function () {
  document.documentElement.className += " fonts-loaded";
}, function () {
  console.log('Font is not available after waiting 10 seconds.');
});
