const texts = [
    'bez naruszeń prywatności',
    'bez cenzury',
    'bez narzucania Ci naszych przekonań',
    'niezależnie od Twojej wiary',
    'za darmo',
];
let currentTextPlace = 0;
let charIndex = 0;
let typingSpeed = 50;

function typeText() {
    const currentText = texts[currentTextPlace];
    
    if (charIndex < currentText.length) {
        document.querySelector('.changing-text-6fhvf7').innerHTML += currentText.charAt(charIndex);
        charIndex++;
        setTimeout(typeText, typingSpeed);
    } else {
        setTimeout(() => {
            deleteText();
        }, 1000);
    }
}

function deleteText() {
    const currentText = texts[currentTextPlace];
    
    if (charIndex >= 0) {
        document.querySelector('.changing-text-6fhvf7').innerHTML = currentText.substring(0, charIndex);
        charIndex--;
        setTimeout(deleteText, typingSpeed);
    } else {
        currentTextPlace = (currentTextPlace + 1) % texts.length;
        setTimeout(typeText, typingSpeed);
    }
}

typeText();