<?php
    include 'config.php';
    session_start();

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            
            if($row['role'] == 'user'){
                header("Location: user.php");
            } elseif($row['role'] == 'admin'){
                header("Location: admin.php");
            } else {
                echo "Invalid role for user: ".$username;
            }
        }
        else{
            echo "Error Occurred: ".mysqli_error($conn);
        }
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $complaint = $_POST['complaint'];
    
        $query = "INSERT INTO complaint (name, phone, email, complaint) VALUES ('$name', '$phone', '$email', '$complaint')";
        $result = mysqli_query($conn, $query);
    
        if($result){
            ?>
          <script>
            alert("Complaint submitted successfully");
          </script>
          <?php
        } else {
            ?>
            <script>
                alert("Error Occured");
            </script>
            <?php
        }
    }
?>
