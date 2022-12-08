if(window.onload = 'load'){ 
    decodeNow('input_old_link');
    decodeNow2('input_new_link');
  }
  
  function decodeNow(a){
  let video = a;
  let text = document.getElementById(video).getAttribute('value'); 
  let result = text.replace(/&lt;/g, "<");
  result = result.replace(/&gt;/g, ">");
  result = result.replace(/&quot;/g, '"');
  // error hash &apos;
  result = result.replace(/&apos;/g, "'");
  result = result.replace(/&#039;/g, "'");
  //
  result = result.replace(/&amp;/g, '&');
  document.getElementById(video).setAttribute('value', result);
  }

  function decodeNow2(a){
    let video = a;
    let text = document.getElementById(video).innerHTML; 
    let result = text.replace(/&lt;/g, "<");
    result = result.replace(/&gt;/g, ">");
    result = result.replace(/&quot;/g, '"');
    // error hash &apos;
    result = result.replace(/&apos;/g, "'");
    result = result.replace(/&#039;/g, "'");
    //
    result = result.replace(/&amp;/g, '&');
    document.getElementById(video).innerHTML = result;
    }