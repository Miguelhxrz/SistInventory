<?php 
  require_once( '../model/User.php' ); 
  require_once('../model/db_connect.php');
  require_once('../model/Producto.php');

  $user = new User();

  $request = $user->GetUsername();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/register_item.css">
  <title>SistInventory ~ Registrar producto</title>
</head>
<body>

<header class="header">

<h1 class="header__title"> Sist-Invenory </h1>

<nav class="header__nav">
  <ul>
    <li class="nav__item"><a href='./inventory.php'> Inventario</a></li>
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
    <section class="container">

    <h3>Registro de Productos</h3>
      
    <form action="" class="form" name="form" method="POST">
      <h2>•Informacion del Producto•</h2>
      <label for="name">
        Nombre 
        <input type="text" name="name" class="name" placeholder="Nombre del Producto" minlength="6" maxlength="25" max="25" required>
      </label>
    <label for="price">
      Precio
      <input type="number" name="price" class="price" placeholder="Precio del Producto" min="1" required>
    </label>
    <label for="cantidad">
      Cantidad
      <input type="number" name="cantidad" class="cantidad" placeholder="Cantidad" min="1" required>
    </label>

      <input type="submit" name="submit" class="submit" value="Agregar">
    </form>
    </section>

    <?php 
      if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $cantidad = $_POST['cantidad'];

        $producto = new Producto();

        $producto->setName($name);
        $producto->setPrice($price);
        $producto->setCantidad($cantidad);

        $done = $producto->addproducto();
        if(isset($done)){
          echo "<script>window.location.href = './inventory.php'</script>";
        }
      }
    ?>
  </main>
</body>
</html>