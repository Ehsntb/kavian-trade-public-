const addProductForm = document.getElementById("addProductForm");

addProductForm.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent default form submission

  // Get productId values
  const title = document.getElementById("title").value;
  const short_description = document.getElementById("short_description").value;
  const main_image = document.getElementById("main_image").value;
  const long_description = document.getElementById("long_description").value;

  // Implement your login logic here (e.g., send AJAX request to server)
  fetch("/admin/deleteproduct/:id", {
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
        window.location.href = "/admin/contactus";
      } else {
        // Handle login failure (e.g., display error message)
        console.error("Login failed");
        alert("Invalid username or password");
      }
    })
    .catch((error) => console.error(error));
});
