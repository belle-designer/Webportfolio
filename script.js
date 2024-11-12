function toggleMenu(){
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".mobile-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
}

/*AFTER SENDING MESSAGE AND VALIDATION */
function sendMail(event) {
    event.preventDefault();

    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let message = document.getElementById("message").value;

    // Validation
    if (!name) {
        showAlert("Please enter your name.");
        return;
    }

    if (!email || !email.includes("@")) {
        showAlert("Please enter a valid email address.");
        return;
    }

    if (!message) {
        showAlert("Please enter your message.");
        return;
    }

    let params = {
        name: name,
        email: email,
        message: message,
    };

    emailjs.send("service_y398wxu", "template_ks56j6l", params)
        .then(function(response) {
            console.log("Email Sent:", response);

            document.getElementById("conform").style.display = "none";
            document.getElementById("thank-you-message").style.display = "block";
        }, function(error) {
            console.log("Error sending email: ", error);
        });
}

function showAlert(message) {
    const alertMessage = document.getElementById('alertMessage');
    alertMessage.textContent = message;
    const alertModal = document.getElementById('alertModal');
    alertModal.style.display = 'flex';
}

function closeAlert() {
    const alertModal = document.getElementById('alertModal');
    alertModal.style.display = 'none';
}

function showForm() {
    document.getElementById("thank-you-message").style.display = "none";
    document.getElementById("conform").style.display = "block";
    document.getElementById("conform").reset();
}
