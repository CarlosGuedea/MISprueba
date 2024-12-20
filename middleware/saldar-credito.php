<?php
    $db = new Base;
    $con = $db->ConexionBD();

    $idCredito = $_POST["id_credito"];
    $cantidadCredito = $_POST["cantidad_credito"];

    // Consulta para obtener el monto y el saldo
    $consulta = "SELECT monto, saldo FROM Creditos WHERE id_credito = :id_credito";
    $stmt = $con->prepare($consulta);
    $stmt->bindParam(":id_credito", $idCredito, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $monto = $resultado["monto"];
        $saldo = $resultado["saldo"];
        
        
                $updateSaldo = $saldo - $cantidadCredito;

                // Actualiza el saldo del crédito
                $consultaActualizar = "UPDATE Creditos SET saldo = :updateSaldo WHERE id_credito = :id_credito";
                $stmtActualizar = $con->prepare($consultaActualizar);
                $stmtActualizar->bindParam(":updateSaldo", $updateSaldo, PDO::PARAM_INT);
                $stmtActualizar->bindParam(":id_credito", $idCredito, PDO::PARAM_INT);
                $stmtActualizar->execute();

                // Redirige de vuelta a la página de créditos después de abonar
                header("Location: /creditos/1");
            } else {
                echo "Error: La cantidad a abonar no debe ser mayor al monto pendiente.";
            }
?>