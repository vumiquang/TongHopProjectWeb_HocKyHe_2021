// Dropdown menu
const btnDropDowns = document.querySelectorAll(".nav .menu li a");
const dropDownMenus = document.querySelectorAll(".dropdown-menu .sub-menu");
const dropDownMenuWrap = document.querySelector(".dropdown-menu");
const hiddenMenu = () => {
  dropDownMenus.forEach((menu) => {
    menu.style = "transition: opacity 400ms ease 0s; opacity: 0; display: none";
  });
};

btnDropDowns.forEach((btn) => {
  btn.onmouseover = (e) => {
    hiddenMenu();
    let dropDown = btn.getAttribute("data-ix");

    let dropDownMenu = document.querySelector(`.dropdown-menu .${dropDown}`);
    if (dropDownMenu)
      dropDownMenu.style =
        "transition: opacity 400ms ease 0s; opacity: 1; display: flex";
  };
});

dropDownMenuWrap.onmouseleave = (e) => {
  hiddenMenu();
};

// Sticky menu
window.onscroll = function () {
  myFunction();
};
let navbar = document.querySelector("header nav");
let divToggle = document.querySelector("header .toggle-menu");
let spanToggle = document.querySelector("header .toggle-menu span");
let imgLogoToggle = document.querySelector("header .toggle-menu img");
function myFunction() {
  let sticky = navbar.offsetHeight;
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    divToggle.style = "background:rgba(255,255,255,0.6)";
    imgLogoToggle.style = "display:inline;";
    spanToggle.style = "color: #000;";
  } else {
    navbar.classList.remove("sticky");
    divToggle.style = "";
    imgLogoToggle.style = "display:none;";
    spanToggle.style = "color: #fff;";
  }
}

// Menu mobile

const nav = document.querySelector(".nav");
const toggleBtn = document.querySelector(".toggle-menu span");
const wrapMenu = document.querySelector(".wrap-menu-mobile");
let isActice = true;
let toggleState = true;
toggleBtn.onclick = () => {
  nav.classList.toggle("active");
  if (isActice) {
    wrapMenu.height = "100%";
  } else {
    wrapMenu.height = "0";
  }
  isActice = !isActice;
};

// Open contact us
const btnClose = document.querySelector(".btn-close-contact");

btnClose.onclick = () => {
  document.querySelector(".contact-us").classList.remove("active");
};
const btnOpen = document.querySelector(".btn-open-contact");
const btnMOpen = document.querySelector(".m-contact-us");
btnOpen.onclick = () => {
  document.querySelector(".contact-us").classList.add("active");
};
btnMOpen.onclick = () => {
  // alert(0);
  document.querySelector(".contact-us").classList.add("active");
};

$(window).resize(function () {
  var width = $(window).width();
  console.log(width);
  if (width <= 1200 && width > 800) {
    $(".contact-us iframe").css("display", "block");
    $(".contact-us .row").css("width", "800");
    $(".contact-us iframe").css("width", "300");
    $(".contact-us .info").css("width", "500");
  } else if (width <= 800 && width > 600) {
    $(".contact-us .info").css("width", "500");
    $(".contact-us .row").css("width", "500");
    $(".contact-us iframe").css("display", "none");
  } else if (width < 600) {
    $(".contact-us .row").css("width", width);
    $(".contact-us iframe").css("display", "none");
    $(".contact-us .info").css("width", width);
  } else {
    $(".contact-us iframe").css("display", "block");
    $(".contact-us .row").css("width", "1100");
    $(".contact-us iframe").css("width", "500");
    $(".contact-us .info").css("width", "500");
  }
});
