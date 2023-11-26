$(function () {
    // include path
    const include_path = $('input[name="include_path"]').val();

    // showing posts when clicking on post cards
    $('.posts-content .post').on('click', function () {
        $(this).find('a')[0].click();
    })
})

function restart() {
    document.addEventListener('click', () => {
        location.reload()
    })
}

// Menu Toggle
function menuToggle() {
  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");
  var windowWidth = window.innerWidth;
  var mobileNavItems = document.querySelector(".mobile-nav-items");


  if (windowWidth <= 999) {
    if (menuMobile.classList.contains("show")) {
      closeMenu();
      enableDropdown(); // Habilita a funcionalidade do dropdown quando o menu está aberto
    } else {
      openMenu();
      mobileNavItems.innerHTML = navbar.querySelector(".nav-items").innerHTML;
    }
  } else {
    menuMobile.classList.remove("show");
    body.style.overflow = "auto";
  }
}

function enableDropdown() {
  var menuToggleIcon = document.querySelector(".fa-bars"); // Seletor do ícone do menu-toggle
  var dropdownItems = document.querySelector("ul.dropdown");

  menuToggleIcon.addEventListener("click", function () {
    if (dropdownItems.style.visibility === "visible") {
      dropdownItems.style.visibility = "hidden";
      dropdownItems.style.opacity = 0;
    } else {
      dropdownItems.style.visibility = "visible";
      dropdownItems.style.opacity = 1;
    }
  });
}

function openMenu() {
  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");


  menuMobile.classList.add("show"); // Adiciona a classe show para exibir o menu
  body.style.overflow = "hidden"; // Desabilita overflow
  // Esconde a navbar
}

function closeMenu() {

  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");

  ; // Exibe a navbar
  menuMobile.classList.add("hide"); // Adiciona a classe hide para animação

  body.style.overflow = "auto"; // Restaura overflow

  setTimeout(function () {
    menuMobile.classList.remove("hide"); // Remove a classe hide após a animação
    menuMobile.classList.remove("show"); // Garante que a classe show seja removida
  }, 500); // Tempo igual à duração da animação em milissegundos
}

window.addEventListener('resize', function () {
  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");
  var windowWidth = window.innerWidth;

  if (windowWidth > 999 && menuMobile.classList.contains("show")) {
    // Se a tela for maior que 999 pixels e o menu estiver visível, fecha o menu e exibe a navbar
    closeMenu();
  }
});

document.addEventListener('DOMContentLoaded', function () {
  var menuMobile = document.getElementById("menu-mobile");

  menuMobile.addEventListener('click', function (event) {
    // Verifica se o clique foi em um dos links desejados
    var clickedElement = event.target;

    // Verifica se o elemento clicado é um link e se tem a classe 'close-menu'
    if (clickedElement.tagName === 'A' && clickedElement.classList.contains('close-menu')) {
      closeMenu(); // Fecha o menu mobile
    }
  });
});
