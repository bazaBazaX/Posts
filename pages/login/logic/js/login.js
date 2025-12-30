document.getElementById("loginForm").addEventListener("submit", function(exact) {
    exact.preventDefault();

    const login = document.getElementById("nameInput").value.trim();
    const password = document.getElementById("passwordInput").value.trim();
    const errorMessage = document.getElementById("errorMessage");

    if(password.length < 8 || login.length < 8 || password === "" || login === "") {
        errorMessage.textContent = "Wrong password or login.";
        return;
    }

    fetch("/pages/login/logic/php/login.php", {
        method: "POST",
        headers: { "Content-Type" : "application/json"},
        body: JSON.stringify({ login, password})
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            window.location.href = "/pages/posts/index.php";
        } else {
            errorMessage.textContent = "Wrong password or login.";
        }
    });
})