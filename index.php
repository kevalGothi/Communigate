<?php
include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['pass']); // Not recommended, consider using more secure hashing methods

    $queryMembers = "SELECT * FROM members WHERE email = ? AND password = ?";
    $queryStaff = "SELECT * FROM staff WHERE email = ? AND password = ?";
    
    $stmtMembers = mysqli_prepare($conn, $queryMembers);
    mysqli_stmt_bind_param($stmtMembers, "ss", $email, $password);
    mysqli_stmt_execute($stmtMembers);
    $resultMembers = mysqli_stmt_get_result($stmtMembers);

    $stmtStaff = mysqli_prepare($conn, $queryStaff);
    mysqli_stmt_bind_param($stmtStaff, "ss", $email, $password);
    mysqli_stmt_execute($stmtStaff);
    $resultStaff = mysqli_stmt_get_result($stmtStaff);

    if (mysqli_num_rows($resultMembers) > 0 || mysqli_num_rows($resultStaff) > 0) {
        $row = mysqli_fetch_assoc($resultMembers);
        $row1 = mysqli_fetch_assoc($resultStaff); // Use result from members if found
        
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('Location: ./admin/dashboard.php');
            exit();
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('Location: ./user/dashboard.php');
            exit();
        } elseif ($row1['user_type'] == 'staff') {
            $_SESSION['staff_name'] = $row['name'];
            header('Location: ./staff/visitor.php');
            exit();
        }
    } else {
        $error = 'Incorrect email or password!';
    }

    mysqli_stmt_close($stmtMembers);
    mysqli_stmt_close($stmtStaff);
    mysqli_close($conn);
}
?>




<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style1.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
      /* Center the container vertically and horizontally */
      /* body, html {
        height: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
      } */
  
      .error-msg
      {
        height:100%;
        background-color:crimson;
        color:#fff;
        margin:auto;
        padding:10px;
      }
  
  
      /* .container {
        text-align: center;
        position: relative; /* Add this for positioning the toggle *
      } */
  
      /* Adjust the position of the password-toggle span */
      .password-toggle {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <section class="hero">
      <video autoplay loop muted plays-inline class="back-video">
        <!-- change the video to your own -->
        <source src="assets/video.mp4" />
      </video>

      <!-- <section class="content"> -->
        <main class="container">
          <h1><br><span class="special">Login</span></h1>
          <form action="" method="POST">
            <?php
            if(isset($error)){
              
                echo '<span class="error-msg">'.$error.'</span>';
              
            }
            ?>
            <section class="form-control">
              <input type="text" name="email" required />
              <label>Email</label>
            </section>
            <section class="form-control">
              <input type="password" name="pass" id="password" onclick="eyevisible()" required />
              <label>Password</label>
              <span class="password-toggle" onclick="togglePasswordVisibility()">
                <i class="material-icons-outlined" style="display:none;" id="eye-icon">visibility</i>
              </span>
            </section>
            <button type="submit" class="btn" name="submit">Login</button>
          </form>
        </main>
      
        <!-- <h1>Welcome To CommuniGate</h1>
        <a href="">Login</a> -->
      <!-- </section> -->
    </section>

    <script>
      function eyevisible(){
        document.getElementById('eye-icon').style.display='block';
        
      }
      
      
      
      
      
      
      function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          eyeIcon.textContent = 'visibility_off';
        } else {
          passwordInput.type = 'password';
          eyeIcon.textContent = 'visibility';
        }
      }
      
      const allLabels = document.querySelectorAll(".form-control label");
  
      allLabels.forEach((label) => {
        label.innerHTML = label.innerHTML
        .split("")
        .map(
          (letter, index) =>
          `<span style="transition-delay:${index * 50}ms">${letter}</span>`
          )
          .join("");
          // document.getElementById('eye-icon').style.display='block';
        });
    </script>

  </body>
</html>
