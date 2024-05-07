function validateRegistration() {
    var fullName = document.getElementById("fullname").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password2").value;
    var errorMessage = document.getElementById("error-message");

    // Basic validation
    if (fullName === "" || username === "" || email === "" || phoneNumber === "" || password === "" || confirmPassword === "") {
        errorMessage.innerText = "Please fill in all fields above";
        return false; // Prevent form submission
    } else {
        // Perform registration logic here (you can replace this with an actual API call)
        alert("Registration successful!");

        // Clear any previous error message
        errorMessage.innerText = "";

        // You can redirect the user to another page or perform other actions
        // For example: window.location.href = "login.html";

        return true; // Allow form submission
    }
}
