function toggleMenu(){
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".mobile-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
}

// Function to validate form data before submission
function validateForm() {
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var message = document.getElementById('message').value.trim();
    var errorMessage = document.getElementById('error-message');

    // Clear previous error messages
    errorMessage.style.display = 'none';
    errorMessage.innerHTML = '';

    // Validate name field
    if (name === '') {
        errorMessage.style.display = 'block';
        errorMessage.innerHTML = 'Name is required.';
        return false;  // Prevent form submission
    }

    // Validate email field
    if (email === '') {
        errorMessage.style.display = 'block';
        errorMessage.innerHTML = 'Email is required.';
        return false;  // Prevent form submission
    }

    // Validate message field
    if (message === '') {
        errorMessage.style.display = 'block';
        errorMessage.innerHTML = 'Message is required.';
        return false;  // Prevent form submission
    }

    // Simple email validation using regex
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        errorMessage.style.display = 'block';
        errorMessage.innerHTML = 'Please enter a valid email address.';
        return false;  // Prevent form submission
    }

    // If all validations pass, form is submitted
    return true;
}
