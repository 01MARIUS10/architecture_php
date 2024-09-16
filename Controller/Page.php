<?php

class Page extends Controller{
    public $etudiant;
    public $parcour;

    public function __construct($etudiant,$parcour){
        Parent::__construct();
        $this->etudiant = $etudiant;
        $this->parcour = $parcour;
    }
    public function Home(){
        echo 'here';
        Parent::getPage()->renderView("/Page/home.php");
    }
    public function Add(){
        $parcours = $this->parcour->findAll();
        Parent::getPage()->add([
            "parcours" =>$parcours
        ]);
        Parent::getPage()->renderView("/Page/ajouter.php");
    }
    public function Show(){
        $eleves = $this->etudiant->findAll();
        $parcours = $this->parcour->findAll();
        Parent::getPage()->add([
            "etudiants"=>$eleves,
            "parcours" =>$parcours
        ]);
        Parent::getPage()->renderView("/Page/list.php");
    }
    public function Register(){
        $nom = "\"".($_POST["nom"])."\"" ;
        $age = ($_POST["age"]);
        $parcour = ($_POST["parcour"]);
        
        $status = $this->etudiant->create([$nom,$age,$parcour]);
        Parent::getPage()->add([
            "succes"=>$status
        ]);
        $this->Show();
    }

}

?>