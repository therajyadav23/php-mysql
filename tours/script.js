const container = document.getElementById("container");

document.getElementById("signUp").addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

document.getElementById("signIn").addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

function signUp() {
  let name = signupName.value.trim();
  let email = signupEmail.value.trim();
  let password = signupPassword.value.trim();

  if (!name || !email || !password) {
    alert("All fields are required");
    return;
  }

  let users = JSON.parse(localStorage.getItem("users")) || [];

  if (users.find(u => u.email === email)) {
    alert("User already exists");
    return;
  }

  users.push({
    name,
    email,
    password,
    bookings: []
  });

  localStorage.setItem("users", JSON.stringify(users));
  alert("Account created successfully!");

  container.classList.remove("right-panel-active");
}

function login() {
  let email = loginEmail.value.trim();
  let password = loginPassword.value.trim();

  let users = JSON.parse(localStorage.getItem("users")) || [];
  let user = users.find(u => u.email === email && u.password === password);

  if (!user) {
    alert("Invalid email or password");
    return;
  }

  localStorage.setItem("isLoggedIn", "true");
  localStorage.setItem("currentUser", email);

  window.location.href = "dashboard.html";
}