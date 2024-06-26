<div class="form-signin rounded-5 p-4 mx-5">
    <div class="form-container bg-white p-4 rounded">
        <div class="form-header text-center">
            <h1 class="h3 mb-3 fw-normal"></h1>
            <img class="mb-4 mx-auto d-block rounded-circle" src="images/ppiImage.png" alt="Logo" width="200" height="200">
        </div>
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="uname" placeholder="Username" name="uname">
                <label for="uname">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
                <label for="pwd">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="btnSignin">Sign in</button>
        </form>
    </div>
</div>
    <?php 
    if(isset($_POST['btnSignin'])){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];

        if(empty($uname) && empty($pwd)){
            echo "<script>
                alert('Your field is empty');
                </script>";
        }else if($uname == 'admin') {
            if( $pwd =="123"){
                echo "<script>
                alert('Sign in seccussfully!');
                </script>";
                header('location:navbar.php');
            }else{
                echo "<script>
                alert('Your password is incorrect');
                </script>";
            }
        }else{
            if($pwd == "123"){
                echo "<script>
                alert('Your username is incorrect');
             </script>";
            }else{
                echo "<script>
                alert('Invalid username and password. Please fild again');
                </script>";
            }
        }        


    }
?>
 