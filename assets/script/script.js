//валидация данных формы регистрации и входа
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
})()

//кнопка
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  var btn = document.getElementById("scrollToTopBtn");
  if (document.body.scrollTop > 0|| document.documentElement.scrollTop > 300) {
    btn.style.display = "block";
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50) {
      btn.style.bottom = "50px";
    } else {
      btn.style.bottom = "50px";
    }
  } else {
    btn.style.display = "none";
  }
}

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}