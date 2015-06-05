<?php

// conectar
$m = new MongoClient();

// seleccionar una base de datos
$bd = $m->miprimerabd;

// seleccionar una colección (equivalente a una tabla en una base de datos relacional)
$colección = $bd->noticias;

// añadir un registro
//$documento = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
//$colección->insert($documento);

// añadir un nuevo registro, con un distinto "perfil"
//$documento = array( "title" => "XKCD", "online" => true );
//$colección->insert($documento);

// encontrar todo lo que haya en la colección
$cursor = $colección->find();

// recorrer el resultado
//echo json_encode(iterator_to_array($cursor));

$arr = array();

    foreach($cursor as $c)
    {
        $temp = array("titulo" => $c["titulo"], "descr" => $c["descr"],"fecha" => $c["fecha"]);
        array_push($arr, $temp);
    }

echo json_encode($arr,JSON_UNESCAPED_UNICODE);



/*foreach ($cursor as $documento) {
    echo $documento["titulo"] . "\n";
}*/

?>