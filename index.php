<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
  <title>SistInventory</title>
</head>
<body>
  <header class="header">
  
  </header>
  <main class="container">
    <form action="<?php echo htmlspecialchars ($_SERVER ['PHP_SELF']); ?>" method="POST" class="login__container">

      <h4 class="login__title"> Login </h4>

      <label for="" class="login__label">
        Username
        <input type="text" name="username" class="input__login"   >
      </label>

      <label for="" class="login__label">
        Password
        <input type="password" class="input__login"  name="password">
      </label>

      <input type="submit" name='send' value="Login" class="btn__login">

      <?php 

        require_once( './model/User.php' );

        $user =  new User();

        if( isset($_POST['send']) ) {

          $username = $_POST['username'];
          $password = $_POST['password'];

          $login = $user->Login( $username, $password);


          if ( $login !== 1) {

            echo "<h2 class='error'>".$login."</h2>";
          
          }else {


            header('Location: '.'./view/inventory.php');


          }
         



        }
      
      
      
      
      ?>

    </form>
  </main>
  <footer>

  </footer>
</body>
</html>