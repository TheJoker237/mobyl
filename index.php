<?php
    header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1 
    header("Cache-Control: post-check=0, pre-check=0", false); 
    header("Cache-Control: private");
    header("Pragma: no-cache");
    header('Content-Type:text/html; Charset=UTF-8');
	
	ob_start();

	session_start();

	define("BASEURL", "/");

	require("db.php");
	$query = array();
	$parts = parse_url($_SERVER["REQUEST_URI"]);
	if(isset($parts['query'])){
		parse_str($parts['query'], $query);
		if(isset($query) && count($query)>0){
			foreach ($query as $key => $value) {
				$_REQUEST[$key] = $value;
			}
		}
	}
	require "models/classes.php";

    $ctrl = "home"; // Page d'acceuil par défaut
	if(isset($_REQUEST['page']) ){
		$ctrl = $_REQUEST['page'];
	}

	if(!isset($_SESSION['lang'])){
		$_SESSION['lang'] = 'fr';
	}

	//require("langs/".$_SESSION['lang'].".php"); //Chargement du fichier langue

	require_once("fonctions.php");    // Chargement des fonction de base

    switch($ctrl){
       
          case 'home':{
            $page_title = "Accueil";
            include("views/header.php");
            include("views/menu.php");
            include("views/home.php");
            include("views/footer.php");
            break;
        }
        case 'about':{
            $page_title = "about";
            include("views/header.php");
            include("views/menu.php");
            include("views/about.php");
            include("views/footer.php");
            break;
        }
         case 'partner':{
            $page_title = "about";
            include("views/header.php");
            include("views/menu.php");
            include("views/partner.php");
            include("views/footer.php");
            break;
        }
         case 'valeurs':{
            $page_title = "about";
            include("views/header.php");
            include("views/menu.php");
            include("views/valeurs.php");
            include("views/footer.php");
            break;
        }
       
         case 'implantation':{
            $page_title = "reglement";
            include("views/header.php");
            include("views/menu.php");
            include("views/implantation.php");
            include("views/footer.php");
            break;
        }
          case 'vision':{
            $page_title = "reglement";
            include("views/header.php");
            include("views/menu.php");
            include("views/vision.php");
            include("views/footer.php");
            break;
        }
        case 'ambition':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/ambition.php");
            include("views/footer.php");
            break;
        }
        case 'professionnels':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/professionnels.php");
            include("views/footer.php");
            break;
        }
        case 'entreprise':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/entreprise.php");
            include("views/footer.php");
            break;
        }
          case 'catalogue':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/catalogue.php");
            include("views/footer.php");
            break;
        }
        case 'agenda':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/agenda.php");
            include("views/footer.php");
            break;
        }
        case 'carburant':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/carburant.php");
            include("views/footer.php");
            break;
        }
        case 'huile':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/huile.php");
            include("views/footer.php");
            break;
        }
        case 'lubrifiant':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/lubrifiant.php");
            include("views/footer.php");
            break;
        }
         case 'gaz':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/gaz.php");
            include("views/footer.php");
            break;
        }
        case 'services':
            $cible = isset($_GET['cible'])? trim($_GET['cible']) : "load";
            switch($cible){
                case 'load':{
                    $page_title = "speaker";
                    include("views/header.php");
                    include("views/menu.php");
                    include("views/services.php");
                    include("views/footer.php");
                    break;
                }
                default:{
                    if(is_numeric($cible)){
                        $page_title = "Liste";
                        $_REQUEST['id']=$cible;
                        include("views/header.php");
                        include("views/menu.php");
                        include("views/serviced.php");
                        include("views/footer.php");
                        break;
                    }
                }
            }
        break;
        case 'actualite':
            $cible = isset($_GET['cible'])? trim($_GET['cible']) : "load";
            switch($cible){
                case 'load':{
                    $page_title = "speaker";
                    include("views/header.php");
                    include("views/menu.php");
                    include("views/actualite.php");
                    include("views/footer.php");
                    break;
                }
                default:{
                    if(is_numeric($cible)){
                        $page_title = "Liste un etudiant";
                        include("views/header.php");
                        include("views/menu.php");
                        include("views/actualited.php");
                        include("views/footer.php");
                        break;
                    }
                }
            }
        break;
     
        case 'photo':{
            $page_title = "mention";
            include("views/header.php");
            include("views/menu.php");
            include("views/photo.php");
            include("views/footer.php");
            break;
        }
      
       
        case 'presse':{
            $page_title = "location";
            include("views/header.php");
            include("views/menu.php");
            include("views/presse.php");
            include("views/footer.php");
            break;
        }
      
        
        case 'contact':{
            $page_title = "contact";
            include("views/header.php");
            include("views/menu.php");
            include("views/contact.php");
            include("views/footer.php");
            break;
        }
       
        case 'mail':{
            $page_title = "News letter";
            include("models/contact.php");
            break;
        }
        
        default:{
            header("Location: ".getBaseUrl()."home");
            header('location:../views/error.php');
        }
      }
        
  
	ob_end_flush();
?>
