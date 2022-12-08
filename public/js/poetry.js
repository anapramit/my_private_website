
let clickNext = document.getElementById("click-next");
let clickBefor = document.getElementById("click-befor");
let howManyMax = clickBefor.getAttribute('data-type2');
 
function rexnext(num){
  if(num > howManyMax){
    return 0;
  }else{
    return num;
  }
}

function next(){
  let number = clickBefor.getAttribute('data-type');
  let nextNumber = "poetry-" + number;
  let number2 = parseInt(number) + 1; 
  number2 = rexnext(number2);
  let nextNumber2 = "poetry-" + number2;
  document.getElementById(nextNumber).setAttribute('style', 'display:none');
  document.getElementById(nextNumber2).setAttribute('style', 'display:block');
  let info = number2 + '/' + howManyMax;
  document.getElementById('information-click').innerText = info;
  clickBefor.setAttribute('data-type', number2);
};
function rexbefor(num){
  if(num < 0){
    return howManyMax;
  }else{
    return num;
  }
}
function befor(){
  let number = clickBefor.getAttribute('data-type');
  let nextNumber = "poetry-" + number;
  let number2 = parseInt(number) - 1; 
  number2 = rexbefor(number2);
  let nextNumber2 = "poetry-" + number2;
  document.getElementById(nextNumber).setAttribute('style', 'display:none');
  document.getElementById(nextNumber2).setAttribute('style', 'display:block');
  let info = number2 + '/' + howManyMax;
  document.getElementById('information-click').innerText = info;
  clickBefor.setAttribute('data-type', number2);
};

clickNext.addEventListener("click", next);
clickBefor.addEventListener("click", befor);
