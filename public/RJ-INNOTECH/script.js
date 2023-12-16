function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

//Script para sa typewriter na design
var TxtType = function(el, toRotate, period) { 
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
}
TxtType.prototype.tick = function() { 
  var i = this.loopNum % this.toRotate.length; 
  var fullTxt = this.toRotate[i]; 
  if (this.isDeleting) { 
      this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
  }
  this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';
  var that = this;
  var delta = 200 - Math.random() * 100;
  if (this.isDeleting) {
      delta /= 2;
  }
  if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
  }
  setTimeout(function() {
      that.tick();
  }, delta);
};
window.onload = function() {
  var elements = document.getElementsByClassName('typewrite');
  for (var i = 0; i < elements.length; i++) { 
      var toRotate = elements[i].getAttribute('data-type');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
      }
  }

  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid white}";
  document.body.appendChild(css); 
};

//Promotional Video
  const playButton = document.getElementById('playButton');
  const videoContainer = document.getElementById('videoContainer');
  const closeButton = document.getElementById('closeButton');

  playButton.addEventListener('click', () => {
      videoContainer.classList.toggle('fullscreen'); 
      const video = document.getElementById('promoVideo');
      if (videoContainer.classList.contains('fullscreen')) {
          video.play(); 
      } else {
          video.pause();
      }
  });

  closeButton.addEventListener('click', () => {
      videoContainer.classList.remove('fullscreen'); 
      const video = document.getElementById('promoVideo');
      video.pause();
  });

//Modal Ribbie
var contactModal = document.getElementById('contactModal');
var contactButton = document.getElementById('contactButton');
var closedButton = document.getElementById('closedButton');
contactButton.addEventListener('click', function() {
    contactModal.style.display = 'block';
});
closedButton.addEventListener('click', function() {
    contactModal.style.display = 'none';
});
window.addEventListener('click', function(event) {
    if (event.target === contactModal) {
        contactModal.style.display = 'none';
    }
});
// Modal Aaron
var cnct_Modal = document.getElementById('cnct_Modal');
var cnct_Button = document.getElementById('cnct_Button');
var closedButton_2 = document.getElementById('closedButton_2');

cnct_Button.addEventListener('click', function() {
  cnct_Modal.style.display = 'block';
});
closedButton_2.addEventListener('click', function() {
  cnct_Modal.style.display = 'none';
});
window.addEventListener('click', function(event) {
    if (event.target === cnct_Modal) {
      cnct_Modal.style.display = 'none';
    }
});

