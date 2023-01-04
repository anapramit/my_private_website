let loaderStart = document.getElementById("information-loader").getAttribute("data-type3");

document.getElementById(loaderStart).addEventListener("click", function(){
   onbeforeunload = (event) => { 
    let loaderInformation = document.getElementById("information-loader").getAttribute("data-type1");
    let loaderInformation2 = document.getElementById("information-loader").getAttribute("data-type2");
    document.getElementById(loaderInformation2).innerHTML = '<div class="loader"></div><p style="text-align:center; color: rgb(168, 197, 100); font-size"18;">' + loaderInformation + '</p>';
  }
})
