const picture2 = document.getElementById('sliding-picture2');

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.transition = 'transform .5s ease-out';
      entry.target.style.transform = 'translateX(0)';
    } else {
      entry.target.style.transform = 'translateX(-50%)';
    }
  });
})

observer.observe(picture2);