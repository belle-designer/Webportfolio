function toggleMenu(){
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".mobile-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
}

function sendMail(event) {
    event.preventDefault(); 


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

function showForm() {

    document.getElementById("thank-you-message").style.display = "none"; 
    document.getElementById("conform").style.display = "block"; 
    document.getElementById("conform").reset();
}

 