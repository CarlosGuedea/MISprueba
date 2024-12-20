//Insertar header
header = document.querySelector(".header");
header.style.display = "grid";
header.style.gridTemplateColumns = "70% 10% 10% 10%";

//Insertar menu
menu = document.querySelector(".menu");
menu.style.display = "grid"
menu.style.gridTemplateColumns = "33% 33% 33%"
menu.style.gap = "1rem"
menu.style.textAlign = "center"

//Corregir imagenes
menuImg = document.querySelector(".menu-img1");
menuImg.style.maxWidth = "50%"

menuImg = document.querySelector(".menu-img2");
menuImg.style.maxWidth = "50%"

menuImg = document.querySelector(".menu-img3");
menuImg.style.maxWidth = "50%"

//Insertar bordes de articulos
articulo = document.querySelectorAll(".articulo");
console.log(articulo);

for(i=0; i<3; i++){
    articulo[i].style.border = "1px solid gray";
}

//LOGIN
container = document.querySelector(".container");
container.style.border = "1px solid gray";

tituloLogin = document.querySelector(".container-titulo")
tituloLogin.style.textAlign = "center"
console.log(tituloLogin);

