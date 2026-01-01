document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById("emailInput").value.trim();
    const login = document.getElementById("nameInput").value.trim();
    const password = document.getElementById("passwordInput").value.trim();
    const errorMessage = document.getElementById("errorMessage");

    if(password < 8) {
        showError("password must be more than 8 symbols long.");
        return;
    }
    
    fetch("/pages/register/logic/php/register.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, login, password})
    })
    .then(res => res.json())
    .then(data => {
        // if(data_success) {......}
    })
});

// end this, and after test login, because here password hashes.