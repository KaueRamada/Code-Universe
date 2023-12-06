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
      enableDropdown();
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
  var menuToggleIcon = document.querySelector(".fa-bars");
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


  menuMobile.classList.add("show");
  body.style.overflow = "hidden";

}

function closeMenu() {

  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");

  ;
  menuMobile.classList.add("hide");
  body.style.overflow = "auto";

  setTimeout(function () {
    menuMobile.classList.remove("hide");
    menuMobile.classList.remove("show");
  }, 500);
}

window.addEventListener('resize', function () {
  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");
  var windowWidth = window.innerWidth;

  if (windowWidth > 999 && menuMobile.classList.contains("show")) {
    closeMenu();
  }
});

document.addEventListener('DOMContentLoaded', function () {
  var menuMobile = document.getElementById("menu-mobile");

  menuMobile.addEventListener('click', function (event) {

    var clickedElement = event.target;

    if (clickedElement.tagName === 'A' && clickedElement.classList.contains('close-menu')) {
      closeMenu();
    }
  });
});

const input = document.querySelector('.input');

input.addEventListener('input', function () {
  const inputContainer = this.parentNode;
  if (this.value !== '') {
    inputContainer.classList.add('active');
  } else {
    inputContainer.classList.remove('active');
  }
});

document.addEventListener('click', function (event) {
  var menuMobile = document.getElementById("menu-mobile");
  var body = document.querySelector("body");
  var clickedElement = event.target;

  // Verifica se o clique não é dentro do menu mobile nem no ícone do menu
  if (!menuMobile.contains(clickedElement) && !clickedElement.classList.contains('fa-bars')) {
    if (menuMobile.classList.contains("show")) {
      closeMenu();
      body.style.overflow = "auto";
    }
  }
});

// Enviar form com click
document.addEventListener('DOMContentLoaded', function () {
  const icon = document.querySelector('.icon');
  const form = document.querySelector('form');

  icon.addEventListener('click', function () {
    form.submit();
  });
});

// Tela de carregamento
window.addEventListener('beforeunload', function () {
  const loader = document.querySelector('.loader-container');
  loader.style.display = 'flex';
});

window.addEventListener('load', function () {
  const loader = document.querySelector('.loader-container');
  loader.style.display = 'none';
});


// Menu categorias

const labelPlus = document.querySelector('.label-plus');

labelPlus.addEventListener('click', function () {
  window.location.href = '#content';
  document.body.style.overflow = 'hidden';
  document.querySelector('.menu-itens').style.overflow = 'auto';
});


// Voltar Menu categorias
function voltar() {
  location.reload();
}

function mostrarMais() {
  const check = document.querySelector('.categories .tec');
  check.style.display = 'none';
}

// Menu categorias navbar

function openMenuContent(){
  const menuPlus = document.querySelector('.menu-plus div');
  const labelPlus = document.querySelector('.menu-plus .label-plus');
  const categoriesTec = document.querySelector('.categories .tec');

  labelPlus.style.display = 'none';
  categoriesTec.style.display = 'none';
  menuPlus.style.display = "flex";
  menuPlus.style.flexWrap = "wrap";
  menuPlus.style.alignItems = "center";
  document.body.style.overflow = 'hidden';
  document.querySelector('.menu-itens').style.overflow = 'auto';
}