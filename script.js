function toggleMenu(){
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".mobile-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
}

function sendMail(event) {
    event.preventDefault(); // Prevent form from submitting

    // Get form values
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let message = document.getElementById("message").value;

    // Validation
    if (!name) {
        alert("Please enter your name.");
        return;
    }

    if (!email || !email.includes("@")) {
        alert("Please enter a valid email address.");
        return;
    }

    if (!message) {
        alert("Please enter your message.");
        return;
    }

    // Collect valid form data
    let params = {
        name: name,
        email: email,
        message: message,
    };

    // Send email using emailjs
    emailjs.send("service_y398wxu", "template_ks56j6l", params)
        .then(function(response) {
            console.log("Email Sent:", response);

            // Hide the form and display the Thank You message
            document.getElementById("conform").style.display = "none"; // Hide the form
            document.getElementById("thank-you-message").style.display = "block"; // Show the Thank You message
        }, function(error) {
            console.log("Error sending email: ", error);
        });
}

function showForm() {
    // Hide the Thank You message and show the form
    document.getElementById("thank-you-message").style.display = "none"; // Hide the Thank You message
    document.getElementById("conform").style.display = "block"; // Show the form again
    
    // Reset the form fields
    document.getElementById("conform").reset();
}

 