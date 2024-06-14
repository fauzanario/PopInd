$('.carousel').carousel({
  interval: 2000
});

function toggleInfo(infoId) {
  var info = document.getElementById(infoId);
  if (info.style.display === 'block') {
    info.style.display = 'none';
  } else {
    info.style.display = 'block';
  }
}


function togglePlay(audioId) {
  const audio = document.getElementById(audioId);
  const playButton = audio.parentNode.querySelector('h5');
  const laguDiv = audio.parentNode;

  if (audio.paused) {
      audio.play();
      playButton.classList.add('playing');
      laguDiv.classList.add('playing');
  } else {
      audio.pause();
      playButton.classList.remove('playing');
      laguDiv.classList.remove('playing');
  }
}


