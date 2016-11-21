<?php
require_once "../../Portal.php";

class Perfil
{
    private $id;
    private $perfil;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $perfil
     * @return Perfil
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

    }
    
    public function getPerfiles(){
        //asdjkasjkdhasjkdhasjkd
        $conn = Portal::getConexion();
        $sql = "select id_perfil, perfil from perfil order by id desc";
        $rs = mysqli_query($conn,$sql);
        $arraylistPerfiles = null;
        while($row = mysqli_fetch_array($rs,MYSQL_BOTH)){
            $objPerfiles = new Perfil();
            $objPerfiles->setId($row['id_perfil']);
            $objPerfiles->setPerfil($row['perfil']);
            $arraylistPerfiles[] = $objPerfiles;
        }
    }

}