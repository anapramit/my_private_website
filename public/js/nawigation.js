// nawigation
let infoWidth = window.innerWidth;
if(infoWidth < 575){
currentWidth (infoWidth);
}
window.addEventListener("resize", newInfoWidth);

function newInfoWidth() {
  infoWidth = window.innerWidth;
  currentWidth(infoWidth);
}

function currentWidth (e){
let info = e;
  if(info <= 575){
    document.getElementById("nav-menu-information").setAttribute("style", "display:block;");
  }else{
    document.getElementById("nav-menu-information").setAttribute("style", "display:none;");
  }
}

document.getElementById("nav-menu-information").addEventListener("click", function(){
    let navNameInformation = document.getElementById("nav-menu-information").getAttribute("data-type");
    navNameInformation = parseInt(navNameInformation);
    if(navNameInformation == 0 ){
        let navNameInformation = document.getElementById("nav-menu-information").setAttribute("data-type", "1");
        document.getElementById("navbarSupportedContent").setAttribute("style", "display:block;");
        document.getElementById("nav-menu-information").innerHTML = '<img id="nav-menu-img" src="/icons/close.svg" style="width:50px; height:30px;filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(87deg) brightness(119%) contrast(119%);">';
    }else{
        let navNameInformation = document.getElementById("nav-menu-information").setAttribute("data-type", "0");
        document.getElementById("navbarSupportedContent").setAttribute("style", "display:none;");
        document.getElementById("nav-menu-information").innerHTML = '<img id="nav-menu-img" src="/icons/menu.svg" style="width:50px; height:30px;filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(87deg) brightness(119%) contrast(119%);">';
    }
  })