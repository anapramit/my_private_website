for (var i = 0; i < 3; i++){
    let numbLang = ['en', 'pl', 'ua'];
    let changelag = numbLang[i];
    let idAddre = "lang-" + changelag ;
    document.getElementById(idAddre).addEventListener('click', function changeLanguage(){
        let lang = changelag; 
        document.getElementById('lang-' + lang).href = '/change-lang?lang=' + lang + '&page=' + window.location.pathname + window.location.search;
    })
}



  
