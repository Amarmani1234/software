<div class="bgc">
  <div class="container">
    <div class="header">
      <h1><span class="l">L</span>OGIN</h1>
    </div>
    <form action="" method="post">
      <label for="uname">Username</label>
      <input type="text" class="inp" name="name" required>
      <label for="psw">Password</label>
      <input type="password" class="inp" name="password" required>
      <button type="submit">Enter</button>
    </form>

    <div class="signup">
      <b>Don't have account?</b>
      <a href="register.php">Sign up</a>
    </div>
  </div>
</div>

<style>
    * {
  box-sizing: border-box;
  border: none;
  text-decoration: none;
  padding: 0;
  accent-color: #1b51ff;
}
body {
  --primary: #1b51ff;
  background: #ccc;
  min-height: 100vh;
  max-width: 100vw;
  display: grid;
  place-items: center;
  overflow-x: hidden;
  font-family: monospace !important;
}
.container {
  background-color: #eee;
  padding: 25px;
  width: 275px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.header {
  text-align: center;
  margin-bottom: 20px;
}
.header h1 {
  font-size: 24px;
  font-weight: 700;
}
h1 > .l {
  font-size: 30px;
  color: var(--primary);
}
label {
  font-weight: 500;
  font-size: 16px;
}
.inp {
  font-weight: 400;
  width: 100%;
  padding: 2.5px 3.75px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid #132;
  border-top: 0;
  border-left: 0;
  border-right: 0;
}
.inp,
.inp:focus {
  outline: none;
}
button {
  background-color: var(--primary);
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  width: 100%;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  opacity: 0.875;
}
button:hover {
  opacity: 1;
}
.signup {
  font-weight: 600;
  width: 250px;
  padding: 0 7.5px;
  text-align: center;
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}
.signup a {
  color: var(--primary);
  text-decoration: none;
}
.signup a:hover {
  text-decoration: underline;
}

</style>



<?php
session_start();

$host = "localhost";
$username = "root";
$password = ""; 
$database = "software";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);

   
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

   
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $username;
            header("Location: dashboard.php"); 
            exit();
        } else {
            echo "❌ Invalid password.";
        }
    } else {
        echo "❌ No user found.";
    }

    $stmt->close();
}

$conn->close();
?>
