// Check if fonts are loaded
var usual = new FontFaceObserver('usual');

Promise.all([usual.load()], 100000).then(function () {
  document.documentElement.className += " fonts-loaded";
}, function () {
  console.log('Font is not available after waiting 10 seconds.');
});
