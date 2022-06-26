<?php 
require_once('../model/Producto.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SistInventory ~ Registrar producto</title>
</head>
<body>

  <header class="header">



  </header>

  <main class="container">
    <section class="container">
    <form action="" class="form" name="form" method="POST">
      <input type="text" name="name" class="name" placeholder="Nombre del Producto" minlength="6" maxlength="25" max="25" required>
      <input type="number" name="price" class="price" placeholder="Precio del Producto" min="1" required>
      <input type="number" name="cantidad" class="cantidad" placeholder="Cantidad" min="1" required>
      <input type="submit" name="submit" value="Agregar">
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