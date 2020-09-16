<?php

	class panier {

		private $DB;

        /**
         * panier constructor.
         * @param $DB
         */
        public function __construct($DB) {
	    	if (!isset($_SESSION)) {
	    		session_start();
	    	}
	    	if (!isset($_SESSION['panier'])) {
	    		$_SESSION['panier'] = array();
	    	}
	    	$this->DB = $DB;
	    }

	    public function add($album_id){
	        if (isset($_SESSION['panier'][$album_id])){
                $_SESSION['panier'][$album_id]++;
            }else{
                $_SESSION['panier'][$album_id]=1;
            }
	    }

	    public function del($album_id){
	    	unset($_SESSION['panier'][$album_id]);
	    }

	    public function total(){

            if (isset($_SESSION['panier'])){
                $ids = implode(',',array_keys($_SESSION['panier']));
            }

            $total=0;


			if (!empty($ids)){
                $requete = 'SELECT * FROM `albums_vinyle` WHERE `id` IN ('.$ids.')';
				$albums = $this->DB->query($requete);


                foreach ($albums as $album) {
                    $total += $album->prix; //* $_SESSION['panier'][$album->id];
                }
			}



	    	return $total;
	    }
        // fonction servant à nettoyer intégralement le panier
        public function clean()
        {
            // réinitialisation du panier
            unset($_SESSION['panier']);
        }
    }
?>