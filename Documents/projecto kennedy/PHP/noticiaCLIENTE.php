<?php

require 'noticiaDAO.php';
$vTitulo = $_POST['titulo'];
$noticia1 = new noticiaVO();
/*$noticia1->setId();
$noticia1->setTitulo("titulo2");
$noticia1->setCopete("Copete2");
$noticia1->setCuerpo("Cuerpo2");*/


$dataNoticia = new noticiaDAO();





/*$alumnado = $dataNoticia->listnoticia2s();
echo "<br><br> TODOS LOS noticia2S: CANTIDAD ".count($alumnado)."<br>";
foreach ($alumnado as $alu) {
 echo $alu->getDni()." - ".$alu->getFullName()."<br>";
}*/
//$dataNoticia->actualizarNoticia($noticia1);
//$dataNoticia->borrarNoticia($noticia1);
//$dataNoticia->insertar($noticia1);
$noticiaFiltrado = $dataNoticia->listNoticiaDinamico($noticia1);   

echo json_encode($noticiaFiltrado);
?>