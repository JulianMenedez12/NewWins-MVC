<?php

function aa(){
    $conexion = mysqli_connect("127.0.0.1","root","root", "NewWins");
    $salida = "";
    $sql = "SELECT * FROM categorias";
    $result = $conexion->query($sql);
    while($fila= $result->fetch_assoc()){
        $salida .= "<option value='".$fila['id']. "'>" . $fila['nombre'] . "</option>";
    }

    return $salida; 

} 