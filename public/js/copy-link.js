let infoUserInfo = document.getElementById("link-send").getAttribute('data-type');

function copyLink(e) {
        navigator.clipboard.writeText(e);    
    }
document.getElementById("copy-link").addEventListener('click', function(){
    copyLink(infoUserInfo);
});
document.getElementById("link-send").addEventListener('click', function(){
    copyLink(infoUserInfo);
});