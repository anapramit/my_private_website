let InfoMaxLoop = document.getElementById('help-text').getAttribute('data-type2');
  for(let i = 1; i <= InfoMaxLoop; i++){
    let iHelp = i;
    let infoHelp = "Help-Text-" + iHelp;
    document.getElementById(infoHelp).addEventListener("click", function(){
    let InfoHelp2 = document.getElementById('help-text').getAttribute('data-type1');

   if(InfoHelp2 == iHelp)
   {
    helpNone(iHelp);
    document.getElementById('help-text').setAttribute('data-type1', '');
   }else{
    if(InfoHelp2){
        helpNone(InfoHelp2);
    }
    helpBlock(iHelp);
    document.getElementById('help-text').setAttribute('data-type1', iHelp);
   }
  });
}

function helpBlock(e){
    document.getElementById(e).setAttribute('style', 'display: block;');
  };
  function helpNone(e){
    document.getElementById(e).setAttribute('style', 'display:none');
    let newCss = "Help-Text-" + e;
    document.getElementById(newCss).setAttribute('style', '');
  };

