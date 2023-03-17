<?php
include ("header.html");
require("config.php");
?>
<h2>Eliminar pedidos</h2>



<?php
foreach($conn->query("SELECT * FROM pedidos WHERE id = '".intval($_GET['codigo'])."'") as $row){

    ?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Fecha</h5>
            <p class="card-text"> <?php echo($row['fecha_pedido']); ?></p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre del producto</h5>
            <p class="card-text"> <?php echo($row['producto']); ?></p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Unidades</h5>
            <p class="card-text"> <?php echo($row['unidades']); ?></p>
            <form method="post" action="eliminar.php">
                <input type="hidden" name="id" >
                <button type="submit">Eliminar producto</button>
            </form>

        </div>
    </div>
    <?php
}
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);


    $sql = "DELETE FROM pedidos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);


    header("Location: consultar.php");
    exit();
}

include ("footer.html");
?>
