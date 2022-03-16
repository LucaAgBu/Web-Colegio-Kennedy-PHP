<?php

require 'noticiasDAO.php';

$noticia1 = new noticiasVO();
//$noticia1->setNombre('martin');
//$noticia1->setId(1);
//$noticia1->setApellido('POO');

$dataNoticia = new noticiasDAO();
//$dataNoticia->insertar($noticia1);




/*$alumnado = $dataNoticia->listAlumnos();
echo "<br><br> TODOS LOS ALUMNOS: CANTIDAD ".count($alumnado)."<br>";
foreach ($alumnado as $alu) {
 echo $alu->getDni()." - ".$alu->getFullName()."<br>";
}*/

//echo "<br>FILTRADO POR DINAMICO <br>";
$noticiaFiltrado = $dataNoticia->listNoticiaDinamico($noticia1);
/*foreach ($noticiaFiltrado as $noticia2) {
  echo $noticia2->getId()." - ".$noticia2->getTitulo()." - ".$noticia2->getCopete()." - ".$noticia2->getCuerpo()."<br>";
}*/
echo json_encode($noticiaFiltrado);
?>