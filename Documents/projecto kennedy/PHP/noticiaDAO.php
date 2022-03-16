<?php 

require_once 'conexion.php';
require 'noticiaVO.php';

class noticiaDAO
{
   
    public function listNoticiaDinamico($not)
    {
        $pdo = Conexion::openConnection();
        /*SENTENCIA SQL GENERAL*/
        $sql = "SELECT * FROM noticia a "; 
        $conditions =[];
        $parameters = [];
        if (!empty($not->getId()))
        {
            // aca usamos operador de igualdad
            $conditions[] = 'id = ?';
            $parameters[] = $not->getId();
        }
        if (!empty($not->getTitulo()))
        {
            // aca usamos operador de igualdad
            $conditions[] = 'titulo LIKE ?';
            $parameters[] = '%'.$not->getTitulo()."%";
        }

        if (!empty($not->getCopete()))
        {
            // aca usamos operador de igualdad
            $conditions[] = 'copete LIKE ?';
            $parameters[] = '%'.$not->getCopete()."%";
        }

        if (!empty($not->getCuerpo()))
        {
            // aca usamos operador de igualdad
            $conditions[] = 'cuerpo LIKE ?';
            $parameters[] = '%'.$not->getCuerpo()."%";
        }
        // codigo para agregar las condiciones, si las hubiera
        if ($conditions)
        {
            $sql .= " WHERE ".implode(" AND ", $conditions);
        }
        $sql .= "LIMIT 0,5";
        /*echo "consulta armada: <br>";
        echo $sql;
        echo "<br>";*/
        /*Otra forma de definir array*/
       $noticias=array();
       try {
            
                $stmt= $pdo->prepare($sql);
                $stmt->execute($parameters);

                $stmt->setFetchMode(PDO::FETCH_CLASS, 'noticiaVO');
                /*USANDO FETCH CLASS NO NECESITAMOS METODO Y SE devuelve una nueva instancia de la clase solicitada, en este caso noticiaVO, haciendo corresponder las columnas del conjunto de resultados con los nombres de las propiedades de la clase*/
                 while($noticia = $stmt->fetch()){
                
                    $noticias[]=$noticia;
                }
                

        } catch (\Throwable $th) {
            echo "Mensaje de Error clase noticia metodo listnoticiaDinamico: " . $th->getMessage();
            
        }

        conexion::closeConnection();
        return $noticias;


    }
    
    /*public function actualizarNoticia($noticia) {
        $pdo = Conexion::openConnection();

        $sql = "UPDATE noticia SET Titulo = ?, Copete = ?, Cuerpo = ? WHERE Id= ?";
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$noticia->getTitulo(), $noticia->getCopete(), $noticia->getCuerpo(), $noticia->getId()]);
            $pdo->commit();

            echo "<BR>ACTUALIZACIÒN SATISFACTORIA: <BR>";


        }
        catch (\Throwable $th){
            echo "ERROR ACTUALIZANDO NOTICIA", $th->getMessage();
            $pdo->rollBack();
            
        }
      
        conexion::closeConnection();    
    }*/

    /*public function borrarNoticia($noticia) {
        $pdo = Conexion::openConnection();

        $sql = "DELETE FROM noticia WHERE Id= ?";
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([ $noticia->getId()]);
            $pdo->commit();

            echo "<BR>BORRADO SATISFACTORIO: <BR>";


        }
        catch (\Throwable $th){
            echo "ERROR BORRANDO NOTICIA", $th->getMessage();
            $pdo->rollBack();
            
        }
      
        conexion::closeConnection();    
    }*/

    public function insertar($noticia) {
        $pdo = Conexion::openConnection();

        $sql = "INSERT INTO noticia(Titulo, Copete, Cuerpo) VALUES (?, ?, ?)";

        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$noticia->getTitulo(), $noticia->getCopete(), $noticia->getCuerpo()]);
            $pdo->commit();

            echo "<BR> INSERT SATISFACTORIO: <BR>";


        }
        catch (\Throwable $th){
            echo "ERROR INSERTANDO NOTICIA: <BR>", $th->getMessage();
            $pdo->rollBack();
            
        }
      
        conexion::closeConnection();    
    }
}
 ?>