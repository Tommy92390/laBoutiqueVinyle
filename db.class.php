<?php

class DB {
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'boutique_vinyles';
    private $db;

	public function __construct($host = null, $username = null, $password = null, $database = null){
		if ($host != null) {
			$this->host = $host; //initialisation
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;

		}

        try{
		    $this->db = new PDO(
            'mysql:host='.$this->host.';dbname='.$this->database,
            $this->username,
            $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );

		}catch(PDOException $e){
		    die('<h1>impossible de se connecter a la BDD</h1>');
        }
	}

	public function query($sql, $data = array()){
		$req = $this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

    /**
     * @param $sql fonction utilisé pour récupérer la table albums_vinyle et afficher les infos grâce à une boucle while.
     * Je l'utilise pour l'inscritption dans la table client et l'ajout d'articles.
     * @return PDOStatement
     */
    public function query2($sql){
        $req = $this->db->prepare($sql);
        $req->execute();
        return $req;
    }

    /**
     * @param $sql fonction que j'utilise dans la page r-connexion pour récupérer les infos de l'utilisateur
     * @param array $data
     * @return array
     */
    public function query3($sql, $data = array()){
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll();
    }

    /**
     * @param $sql PDOStatement::fetchColumn() sert à récupérer le nombre de lignes retournées. J'utilise ce fetch_style pour la page r_inscription ce qui me permet de savoir l'existence d'un compte utilisateur.
     * @param array $data
     * @return le nombre de ligne
     */
    public function query4($sql, $data = array()){
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetch(PDO::FETCH_COLUMN);
    }
}
		

