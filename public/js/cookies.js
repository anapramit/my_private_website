if(window.onload = 'load'){
    let isCookies = localStorage.getItem('isCookies');
    if(!isCookies){
        let cok = document.getElementById('information-cookies');
        let cookies1 = cok.getAttribute('data-type');
        let cookies2 = cok.getAttribute('data-type2');
        let cookies3 = cok.getAttribute('data-type3');
        let cookies4 = cok.getAttribute('data-type4');

        cok.innerHTML = '<div class="fixed-bottom p-4">' +
                '<div class="toast bg-dark text-white w-100 mw-100" role="alert" data-autohide="false">' +
                '<div class="toast-body p-4 d-flex flex-column">' +
                '<h4>' + cookies1 + '</h4>' +
                '<p>' + cookies2 + '</p>' +
                '<div class="ml-auto">' +
                '<button type="button" class="btn btn-outline-light mr-3" id="notAccept">' + cookies3 + '</button>' +
                '<button type="button" class="btn btn-light" id="yesAccept">' + cookies4 + '</button>' +
                '</div></div></div></div>';
    }
}
                let myfunctionNot = document.getElementById("notAccept");
                if(myfunctionNot){
                    document.getElementById("notAccept").addEventListener('click', function myfun(){
                        localStorage.setItem('isCookies', 'false');
                        document.getElementById("information-cookies").innerHTML = '';
                    });
                }
                let myfunctionYes = document.getElementById('yesAccept');
                if(myfunctionYes){
                    document.getElementById("yesAccept").addEventListener('click', function myfun2(){
                        localStorage.setItem('isCookies', 'true');
                        document.getElementById("information-cookies").innerHTML = '';
                    });
                } 

