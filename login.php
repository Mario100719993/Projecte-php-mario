<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {  
    die("conexion fallida: " . $conn->connect_error);
}
//aqui se pondria la base de datos creo...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['password'];
     password =
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user;
        echo "logion exitoso. bienvenido, " . $user;
        } else {
            echo "usuario o contraseña incorrecto.";
        }
        $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<htmal>
<head>
	<title>Login</title>
</head>
<body>
	<from method="POST" action="">
		<label fro="user">usuario:</label>
		<input type="text" name="user" required>
		<br>
		<label fro="password">usuario:</label>
		<input type="password" name="password" required>
		<br>
		<button type="submit">iniciar sesion</button>
	</from>
</body>
</html>


