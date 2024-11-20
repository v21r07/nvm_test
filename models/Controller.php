<?php
class Controller
{
    // CONSTRUCTEUR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    // HYDRATATION
    public function hydrate(array $data) //function qui appèle les automatiquements pour reinitiliser les variables à partir des varibles de la base de données
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method))
                $this->$method($value);
        }
    }
    //Employe/utilisateur
    private $_InitEmploye;
    //GETTER
    

    // SETTERS
    public function setInitEmploye($InitEmploye)
    {
        $this->_InitEmploye = $InitEmploye;
    }
    
    
}