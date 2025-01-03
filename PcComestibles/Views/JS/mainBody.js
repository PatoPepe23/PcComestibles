try {
    buttonRight = document.getElementById('sliderRight').addEventListener('click', slideToRight);
    buttonLeft = document.getElementById('sliderLeft').addEventListener('click', slideToLeft);
    disableButton();
    slideTo();
} catch (error) {
    console.log('No hay botones');
}



function getSlider() {
    slider = document.getElementById('mainSlider')
    children = slider.getElementsByClassName('card');
    childrenLength = children.length;
    clase = (slider.style['margin-left']);
    number = parseInt(clase.split('px'));

    return {
        slider: slider, 
        childrenLength: childrenLength, 
        number: number,
        children: children
    }
}

function slideToRight() {
    
    result = getSlider();
    slider = result.slider;
    childrenLength = result.childrenLength;
    number = result.number;

    finalNumber = number - 263;

    console.log('len ', children.length);

    maxNumber = - (children.length-6) * 263;

    if (finalNumber < maxNumber) {
        slider.style.marginLeft = '0px';
    } else{
        slider.style.marginLeft = finalNumber + 'px';
    }

    disableButton();
    
    slideTo();
}

function slideTo() {
    result = getSlider()
    slider = result.slider.clientWidth

    for (const child of result.children) {
        ancho = child.getBoundingClientRect();
        if (ancho.x < slider) {
            console.log('ancho ', ancho.x);
            console.log('slider ', slider);
        }
    } 
}

function slideToLeft() {

    result = getSlider();
    slider = result.slider;
    childrenLength = result.childrenLength;
    number = result.number;

    finalNumber = number + 263;

    slider.style.marginLeft = finalNumber + 'px';

    disableButton();
}


function disableButton() {
    slider = document.getElementById('mainSlider')
    clase = (slider.style['margin-left']);
    number = parseInt(clase.split('px'));

    buttonLeft = document.getElementById('sliderLeft')
    if (number == 0) {
        buttonLeft.disabled = true;
        console.log(clase);
    } else{
        buttonLeft.disabled = false;
        console.log(clase);
    }
}