const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  // Get username and password values
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Implement your login logic here (e.g., send AJAX request to server)
  fetch('/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ username, password }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.token) {
        // Handle successful login (e.g., store token, redirect to another page)
        console.log('Login successful!');
        localStorage.setItem('jwtToken', data.token);
        // Redirect or handle further actions
      } else {
        // Handle login failure (e.g., display error message)
        console.error('Login failed');
        alert('Invalid username or password');
      }
    })
    .catch((error) => console.error(error));
});
