document.getElementById("postForm").addEventListener("submit", function(exact) {  
    exact.preventDefault();

    const postName = document.getElementById("postName")
    const postMessage = document.getElementById("postMessage")
    const errorMessage = document.getElementById("errorText")

    const postNameValue = postName.value;
    const postMessageValue = postMessage.value;

    // checking the inputs

    if(postName.value.length < 8) {
        errorMessage.textContent = "Name of the post must be longer than 8 symbols.";
        postName.classList.toggle("wrong", true);
        return;
    } else {
        postName.classList.toggle("wrong", false);
    }

    if(postMessage.value.length < 20) {
        errorMessage.textContent = "Post must be longer than 20 symbols.";
        postMessage.classList.toggle("wrong", true);
        return;
    } else {
        postMessage.classList.toggle("wrong", false);
    }

    fetch("/pages/posts/logic/php/createPost.php", {
        method : "POST",
        headers : {"Content-Type" : "application/json"},
        body : JSON.stringify({ postNameValue, postMessageValue })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            window.location.reload();
        } else {
            errorMessage.textContent = data.message;
        }
    })
    .catch(err => {
        console.log(err);
        errorMessage.textContent = err.message;
    });
})