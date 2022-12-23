if(window.onload = 'load'){ 
  textLerght();
}
  let textarea = document.getElementById("input_new_link");
  
  textarea.addEventListener('keyup',  textLerght);

function textLerght(){
    let textarea = document.getElementById("input_new_link");
    let lengthTextArea = textarea.value.length;
   let e = document.getElementById("label_link").innerText;
   let result = e.indexOf("(");
   let first = e.slice(0, result);
  let end = e.slice(result);
  let newInfo = first + "(" + lengthTextArea + "/1900)";
  document.getElementById("label_link").innerText = newInfo;
    }