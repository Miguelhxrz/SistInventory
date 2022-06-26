<?php 
  require_once( '../model/User.php' );
  require_once( '../model/Producto.php' );
  require_once('../model/db_connect.php');
  
  $product = new Producto();

  $producto = $product->showproducto();

  $user = new User();

  $request = $user->GetUsername();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/inventory.css">
  <title>SistInventory ~ Inventory</title>
</head>
<body>
  <header class="header">

  <h1 class="header__title"> Sist-Invenory </h1>

  <nav class="header__nav">
    <ul>
      <li class="nav__item"><a href='./register_item.php'> Registrar producto</a></li>
      <li class="nav__item user">
        <img src="../source/usuario.svg" alt="usuario">
        <p class="username"><?php echo $request ?></p>
      </li>
      <li class="nav__item user">
        <form action="../index.php" method="POST">
          <input type="submit" value="Salir" name="salir" class="salir">
        </form>
        <?php 
        if(isset($_POST['salir'])){
          session_destroy();

        }
        ?>
      </li>
    </ul>
  </nav>

  </header>
  <main class="container">

  <article class="products__container">

  <h2 class="products__title">Bienvenido al inventario</h2>
  
  <section class="products">

  <p class="products__names">id</p>
  <p class="products__names">nombre</p>
  <p class="products__names">precio</p>
  <p class="products__names">cantidad</p>
  <?php foreach($producto as $item) {?>
    <p class="products__names"> <?php echo $item['id'] ?> </p>
    <p class="products__names"> <?php echo $item['nombre'] ?> </p>
    <p class="products__names"> <?php echo $item['precio'] ?> </p>
    <p class="products__names"> <?php echo $item['cantidad'] ?> </p>
  <?php } ?>
  </section>

  </article>
  </main>
</body>
</html>