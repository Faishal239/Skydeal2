<?php
session_start();
include "koneksi.php"; 

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.html?error=Username is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.html?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM tabel_usr WHERE Username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($pass === $row['Password']) {
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['role'] = $row['role']; 

                    if (strtolower($row['role']) === 'admin') {
                        header("Location: ../ADMIN/Admin.php");
                    } else {
                        header("Location: ../Informasi/Informasi2.html");
                    }
                    exit();
                } else {
                    header("Location: index.html?error=Incorrect username or password");
                    exit();
                }
            } else {
                header("Location: index.html?error=Incorrect username or password");
                exit();
            }
        } else {
            echo "Database query error.";
        }
    }
} else {
    header("Location: index.html");
    exit();
}
