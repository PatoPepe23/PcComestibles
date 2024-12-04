buttons = document.getElementsByClassName('dropDown');

for (const button of buttons) {
    button.addEventListener('click', show);
}

function show(buttonName){
    button = event.target;
    container = document.getElementById(button.name);
    div = container.children[1];

    if(div.classList.contains('hide')){
        div.classList.toggle('show');
        container.classList.toggle('open');
    } else{
        div.classList.toggle('show');
        container.classList.toggle('open');
    }    
}

function addEvent(button){
    button.addEventListener('click', show);
}