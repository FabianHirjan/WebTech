// Get the form element
const form = document.querySelector('form');

// Add an event listener for the form submission
form.addEventListener('submit', function (e) {
    // Prevent the default form submission behavior
    e.preventDefault();

    // Get the input field values
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Validate the input field values
    if (email === '' || password === '') {
        alert('Please enter your email and password');
        return;
    }

    // Add the "success" class to the form after a delay
    setTimeout(function () {
        form.classList.add('success');

        // Redirect to index.html after a delay
        setTimeout(function () {
            window.location.href = 'index.html';
        }, 2000);
    }, 2000);
});
