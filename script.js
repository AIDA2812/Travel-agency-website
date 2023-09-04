document.addEventListener("DOMContentLoaded", function() {
    var successMessage = document.getElementById("success-message");
    var closeButton = document.getElementById("close-button");

    closeButton.addEventListener("click", function() {
        successMessage.style.display = "none";
    });

    // Show the success message
    successMessage.style.display = "block";
});

