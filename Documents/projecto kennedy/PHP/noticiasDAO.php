<?php 

require_once 'conexion.php';
require 'noticiasVO.php';

class noticiasDAO
{
    /* private $dni;
    private $nombre;
    private $apellido;

    public function insertar($noticias)
    {   
        
        $pdo = Conexion::openConnection();
        $sql = "INSERT INTO noticias (dni, nombre, apellido, fec_nac) VALUES (?,?,?,now())";    
        $pdo->beginTransaction();
        try {
            
                $stmt= $pdo->prepare($sql);
                $stmt->execute([$noticias->getDni(), $noticias->getNombre(), $noticias->getApellido()]);
                $pdo->commit();
                echo "Registro Satisfactorio";

            
        } catch (\Throwable $th) {
            echo "ERROR REGISTRANDO ALUMNO: " . $th->getMessage();
            $pdo->rollBack() ;
        }

        conexion::closeConnection();                       
    }


    

    public function listnoticia()
    {
       $pdo = Conexion::openConnection();
       $sql = "SELECT * FROM noticias"; 
       $noticia=array();
       try {
            
                $stmt= $pdo->prepare($sql);
                $stmt->execute();
                
                 while($noticias = $stmt->fetch(PDO::FETCH_OBJ)){
                   // ACA USAMOS UN METODO QUE NOS PASA LA FILA A OBJETO
                    $noticia[]=$this->recordsetToUserObject($noticias);
                }
                //echo count($noticia);

        } catch (\Throwable $th) {
            echo "Mensaje de Error clase Alumno metodo listnoticia: " . $th->getMessage();
            
        }

        conexion::closeConnection();
        return $noticia;

    }

    private function recordsetToUserObject($row){
          $a = new noticiasVO();
          $a->setDni( $row->dni );
          $a->setNombre( $row->nombre );
          $a->setApellido( $row->apellido );
          return $a;
    }*/

   /* public function listAlumnoById($dni)
    {
        $pdo = Conexion::openConnection();
        $sql = "SELECT * FROM noticias a where a.dni= ?"; 
       $noticia=array();
       try {
            
                $stmt= $pdo->prepare($sql);
                $stmt->execute([$dni]);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'noticiasVO');
              //  USANDO FETCH CLASS NO NECESITAMOS METODO "recordsetToUserObject" como en el metodo listnoticia Y SE devuelve una nueva instancia de la clase solicitada, en este caso noticiasVO, haciendo corresponder las columnas del conjunto de resultados con los nombres de las propiedades de la clase
                 while($noticias = $stmt->fetch()){
                
                    $noticia[]=$noticias;
                }
                

        } catch (\Throwable $th) {
            echo "Mensaje de Error clase Alumno metodo listnoticia: " . $th->getMessage();
            
        }

        conexion::closeConnection();
        return $noticia;


    }*/
    /* EL SQL SEVA ARMANDO SEGUN LO QUE VENGA DE LAS PROPIEDADES DE LA CLASE ALUMNO*/
    public function listNoticiaDinamico($not)
    {
        $pdo = Conexion::openConnection();
        /*SENTENCIA SQL GENERAL*/
        $sql = "SELECT * FROM noticias a"; 
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
        // codigo para agregar las condiciones, si las hubiera
        if ($conditions)
        {
            $sql .= " WHERE ".implode(" AND ", $conditions);
        }
        $sql .= "LIMIT 0,5";
       /* echo "consulta armada: <br>";
        echo $sql;
        echo "<br>"; */
        /*Otra forma de definir array*/
       $noticia=array();
       try {
            
                $stmt= $pdo->prepare($sql);
                $stmt->execute($parameters);

                $stmt->setFetchMode(PDO::FETCH_CLASS, 'noticiasVO');
                /*USANDO FETCH CLASS NO NECESITAMOS METODO Y SE devuelve una nueva instancia de la clase solicitada, en este caso noticiasVO, haciendo corresponder las columnas del conjunto de resultados con los nombres de las propiedades de la clase*/
                 while($noticias = $stmt->fetch()){
                
                    $noticia[]=$noticias;
                }
                

        } catch (\Throwable $th) {
            echo "Mensaje de Error clase Alumno metodo listNoticiaDinamico: " . $th->getMessage();
            
        }

        conexion::closeConnection();
        return $noticia;


    }



}
 ?>