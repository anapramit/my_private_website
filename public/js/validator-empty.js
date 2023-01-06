if(window.onload = 'load'){ 
    validatorEmpty();
  }
  
  oninput = (event) => { 
    validatorEmpty();
  }
  
  function validatorEmpty() {
    // validatorInformation - how many elements for the loop
    // validatorNameSend - id element - input type = button
    let validatorNameSend = document.getElementById("information-validator").getAttribute("data-type");
    let validatorInformation = document.getElementById("information-validator").getAttribute("data-type1");
    validatorInformation = parseInt(validatorInformation) + 1;
    let validatorNumber = 1;

    for(let iValidator = 2; iValidator <= validatorInformation; iValidator++){
        let dataValidation = "data-type" + iValidator;
        let validatorInformation2 = document.getElementById("information-validator").getAttribute(dataValidation);
        let a = document.getElementById(validatorInformation2).value;

        if(a == null || a == ""){
          document.getElementById(validatorNameSend).disabled = true;
          break;
        }    
        validatorNumber =  parseInt(validatorNumber) + 1;
    }
  
    if (parseInt(validatorNumber) == parseInt(validatorInformation)) {
      document.getElementById(validatorNameSend).disabled = false;
    }
  }
