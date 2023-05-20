function copyBoard(e) {
    var idElement = e.id;
    var copyText = document.getElementsByClassName(idElement);

    copyText[0].select();
    copyText[0].setSelectionRange(0, 99999999)
    document.execCommand("copy");
}