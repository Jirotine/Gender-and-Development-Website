document.querySelector('#surveyDropdown').addEventListener('click', function() {

    document.querySelector('.dropdown-menu').classList.toggle('show');
  });
  
  
  document.addEventListener('click', function(event) {
    if (!event.target.matches('#surveyDropdown')) {
      var dropdownMenu = document.querySelector('.dropdown-menu');
      if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
      }
    }
  });
  
  document.addEventListener("DOMContentLoaded", function() {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
  
    dropdownToggle.addEventListener("click", function() {
      dropdownToggle.classList.toggle("rounded");
    });
  });