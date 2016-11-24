<?php

require_once "../../Portal.php";
class Imagenes
{
    private $id_img;
    private $ruta;
    private $propiedad_id;

    /**
     * @return mixed
     */
    public function getIdImg()
    {
        return $this->id_img;
    }

    /**
     * @param mixed $id_img
     */
    public function setIdImg($id_img)
    {
        $this->id_img = $id_img;
    }

    /**
     * @return mixed
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * @param mixed $ruta
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    /**
     * @return mixed
     */
    public function getPropiedadId()
    {
        return $this->propiedad_id;
    }

    /**
     * @param mixed $propiedad_id
     */
    public function setPropiedadId($propiedad_id)
    {
        $this->propiedad_id = $propiedad_id;
    }
    
    public function save(){
        $conn = Portal::getConexion();
        $sql = "insert into imagenes values (0,'".$this->ruta."',".$this->propiedad_id.")";

        mysqli_query($conn,$sql);        
    }

    public  function getUltimaImagenByPropiedad($propiedad_id){
        $conn = Portal::getConexion();
        $sql = "select * from imagenes where propiedad_id = ".$propiedad_id." order by id_img desc limit 0,1";
      //  echo $sql;
        $rs = mysqli_query($conn,$sql);

        if($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
            $objImagen = new Imagenes();
            $objImagen->setIdImg($row['id_img']);
            $objImagen->setRuta($row['ruta']);
            $objImagen->setPropiedadId($row['propiedad_id']);
        }else{
            $objImagen = new Imagenes();
            $objImagen->setRuta("/portalArriendo/portalArriendo/img/Imagen_no_disponible.jpg");
        }
        return $objImagen;


    }

    public  static function getImagenesByPropiedad($propiedad_id){
        $conn = Portal::getConexion();
        $sql = "select * from imagenes where propiedad_id = ".$propiedad_id." order by id_img desc";
        //  echo $sql;
        $rs = mysqli_query($conn,$sql);
        $arraylist=null;
        while($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
            $objImagen = new Imagenes();
            $objImagen->setIdImg($row['id_img']);
            $objImagen->setRuta($row['ruta']);
            $objImagen->setPropiedadId($row['propiedad_id']);
            $arraylist[]=$objImagen;

        }
        return $arraylist;


    }

    public static function getUltimasTresImagenes(){
        $conn = Portal::getConexion();
        $sql = "select DISTINCT propiedad_id,ruta from imagenes GROUP BY propiedad_id order by id_img desc limit 0,3";
        $rs = mysqli_query($conn,$sql);
        $arraylist=null;
        while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)){
            $objImagenes = new Imagenes();
            $objImagenes->setPropiedadId($row['propiedad_id']);
            $objImagenes->setRuta($row['ruta']);
            $arraylist[] = $objImagenes;
        }
        return $arraylist;
    }

    

}