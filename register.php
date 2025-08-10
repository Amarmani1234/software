<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> User Registration  </title>
  <link rel="stylesheet" href="style.css">
</head>

<!---------------------------------------------------------------------->
<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $company  = trim($_POST['company']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm']);
    if ($password !== $confirm) {
        echo "Passwords do not match.";
        exit;
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "Email already registered.";
        $stmt->close();
        exit;
    }
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO user (name, email, phone, company, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $company, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!---------------------------------------------------------------------------->
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
<form action="" method="POST">
  <div class="user-details">
    <div class="input-box">
      <span class="details">Full Name</span>
      <input type="text" name="name" placeholder="Enter your name" required>
    </div>
    <div class="input-box">
      <span class="details">Email</span>
      <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-box">
      <span class="details">Phone Number</span>
      <input type="text" name="phone" placeholder="Enter your number" required>
    </div>
    <div class="input-box">
      <span class="details">Company</span>
      <input type="text" name="company" placeholder="Enter your company" required>
    </div>
    <div class="input-box">
      <span class="details">Password</span>
      <input type="password" name="password" placeholder="Enter your password" required>
    </div>
    <div class="input-box">
      <span class="details">Confirm Password</span>
      <input type="password" name="confirm" placeholder="Confirm your password" required>
    </div>
  </div>
  <div class="button">
    <input type="submit" value="Register">
  </div>
</form> 
  </div>
    <a href="login.php">All ready sign up</a>
  </div>
</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.container {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.container .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.content form .user-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}

form .user-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}

form .input-box span.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}

.user-details .input-box input {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid {
  border-color: #9b59b6;
}

form .gender-details .gender-title {
  font-size: 20px;
  font-weight: 500;
}

form .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}

form .category label {
  display: flex;
  align-items: center;
  cursor: pointer;
}

form .category label .dot {
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}

#dot-1:checked~.category label .one,
#dot-2:checked~.category label .two,
#dot-3:checked~.category label .three {
  background: #9b59b6;
  border-color: #d9d9d9;
}

form input[type="radio"] {
  display: none;
}

form .button {
  height: 45px;
  margin: 35px 0
}

form .button input {
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

form .button input:hover {
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}

@media(max-width: 584px) {
  .container {
    max-width: 100%;
  }

  form .user-details .input-box {
    margin-bottom: 15px;
    width: 100%;
  }

  form .category {
    width: 100%;
  }

  .content form .user-details {
    max-height: 300px;
    overflow-y: scroll;
  }

  .user-details::-webkit-scrollbar {
    width: 5px;
  }
}
@media(max-width: 459px) {
  .container .content .category {
    flex-direction: column;
  }
}

</style>