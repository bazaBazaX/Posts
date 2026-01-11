document.getElementById("loginForm").addEventListener("submit", function(exact) {
    exact.preventDefault();

    // getting inputs

    const login = document.getElementById("nameInput").value.trim();
    const password = document.getElementById("passwordInput").value.trim();
    const errorMessage = document.getElementById("errorMessage");
    const ifSaving = document.getElementById("rememberAll").checked;

    //checking inputs

    if(password.length < 8 || login.length < 8 || password === "" || login === "") {
        errorMessage.textContent = "Wrong password or login.";
        return;
    }

    //sending inputs

    fetch("/pages/login/logic/php/login.php", {
        method: "POST",
        headers: { "Content-Type" : "application/json"},
        body: JSON.stringify({ login, password, ifSaving })
    })
    .then(res => res.json())
    .then(data => {
        //result
        if(data.success) {
            window.location.href = "../../../pages/posts/index.php";
        } else {
            errorMessage.textContent = data.message;
        }
    })
    .catch(() => {
        errorMessage.textContent = "Server error.";
    });
})