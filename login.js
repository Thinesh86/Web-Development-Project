function validateLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var remember = document.getElementById("remember").checked;

    // Basic validation
    if (username === "" || password === "") {
        document.getElementById("error-message").innerText = "Please enter both username and password.";
    } else {
        
        // Clear any previous error message
        document.getElementById("error-message").innerText = "";

        // You can redirect the user to another page or perform other actions
        // For example: window.location.href = "dashboard.html";
    }
}