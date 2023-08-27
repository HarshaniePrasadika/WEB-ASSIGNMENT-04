// script.js
const form = document.getElementById('multiStepForm');
const steps = form.querySelectorAll('.form-step');
const prevButtons = form.querySelectorAll('.prev-step');
const nextButtons = form.querySelectorAll('.next-step');

let currentStep = 0;

function showStep(stepIndex) {
    steps.forEach((step, index) => {
        if (index === stepIndex) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });
}

nextButtons.forEach((button, index) => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        currentStep++;
        if (currentStep >= steps.length) {
            currentStep = steps.length - 1;
        }
        showStep(currentStep);
    });
});

prevButtons.forEach((button, index) => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        currentStep--;
        if (currentStep < 0) {
            currentStep = 0;
        }
        showStep(currentStep);
    });
});
