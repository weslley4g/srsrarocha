window.onload = reg;


function reg() {
    window.captureEvents(Event.SUBMIT);
    window.onsubmit = printartela;
}

function printartela() {
    window.print();
}