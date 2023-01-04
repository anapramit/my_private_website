if(window.onload = 'load'){
    let isCookies = localStorage.getItem('isCookies');
    if(!isCookies){
        document.body.style = "pointer-events:none; overflow-y:hidden;"
        let cok = document.getElementById('information-cookies');
        let cookies1 = cok.getAttribute('data-type');
        let cookies2 = cok.getAttribute('data-type2');
        let cookies3 = cok.getAttribute('data-type3');
        let cookies4 = cok.getAttribute('data-type4');

        cok.innerHTML = '<div class="cookies-class">' +
                '<img src="/icons/cookie.svg">' +
                '<div class="">' +
                '<h4>' + cookies1 + '</h4>' +
                '<p>' + cookies2 + '</p>' +
                '<div class="cookies-class-2">' +
                '<button type="button" class="cookies-class-button" id="notAccept">' + cookies3 + '</button>' +
                '<button type="button" class="cookies-class-button" id="yesAccept">' + cookies4 + '</button>' +
                '</div></div></div>';
    }
}
                let myfunctionNot = document.getElementById("notAccept");
                if(myfunctionNot){
                    document.getElementById("notAccept").addEventListener('click', function myfun(){
                        localStorage.setItem('isCookies', 'false');
                        document.body.style = "pointer-events:auto; overflow-y:auto;"
                        document.getElementById("information-cookies").innerHTML = '';
                    });
                }
                let myfunctionYes = document.getElementById('yesAccept');
                if(myfunctionYes){
                    document.getElementById("yesAccept").addEventListener('click', function myfun2(){
                        localStorage.setItem('isCookies', 'true');
                        document.body.style = "pointer-events:auto; overflow-y:auto;"
                        document.getElementById("information-cookies").innerHTML = '';
                    });
                } 

