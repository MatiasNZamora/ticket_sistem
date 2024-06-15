<?php
    require_once("../config/connection.php");
    require_once("../models/categoria.php");
    $categoria = new Categoria();

    switch($_GET["op"]){
        
        case "combo":
            $datos = $categoria -> get_categoria();
            if(is_array($datos)==true and count($datos)>0){
                
                // $html="<option></option>";
                foreach($datos as $row ){
                    $html.= "<option value='".$row['cat_id']."'>".$row['cat_nom']."</option>";
                }
                echo $html;
            };

        break;
    }



?>