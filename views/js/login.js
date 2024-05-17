const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent default form submission

  // Get username and password values
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // Implement your login logic here (e.g., send AJAX request to server)
  fetch("/login", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ username, password }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("login failed");
      }
      return response.json();
    })
    .then((data) => {
      if (data.result === "Login successful!") {
        // Handle successful login (e.g., store token, redirect to another page)
        console.log("Login successful!");
        console.log(data.token);
        // localStorage.setItem("token", data.token);
        // response.setHeader('authorization', data.token);
        window.location.href = "/admin/products";
      } else {
        // Handle login failure (e.g., display error message)
        console.error("Login failed");
        alert("Invalid username or password");
      }
    })
    .catch((error) => console.error(error));
});
