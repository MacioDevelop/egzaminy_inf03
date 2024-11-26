function Choose(button) {
    const sections = document.querySelectorAll('.glowny > div');
    sections.forEach(section => {
        section.style.display = 'none'; 
    });

    const targetId = button.id; 
    const targetSection = document.querySelector(`.${targetId}`); 
    if (targetSection) {
        targetSection.style.display = 'block'; 
    }
}

let progress = 0;
function UpdateProgress() {
    const progressBar = document.querySelector('.postep .pasek');
    if (progress < 100) {
        progress += 12; 
        if (progress > 100) progress = 100; 
        progressBar.style.width = progress + '%';
    }
}

function Zatwierdz(event) {
    event.preventDefault();

    const inputs = document.querySelectorAll('.glowny input');
    const values = {};

    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            values[input.placeholder || 'Checkbox'] = input.checked;
        } else {
            values[input.placeholder || 'Input'] = input.value;
        }
    });

    console.log('Zatwierdzone dane:', values);
}
