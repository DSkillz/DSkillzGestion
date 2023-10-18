<?php
include('consolelog.php');

$login_valide = "admin";
$pwd_valide = '9d615266a5768ab25ffbb50a637653b0';

// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['pwd'])) {

// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
$valid = ($login_valide == $_POST['login'] && $pwd_valide == md5($_POST['pwd']));
echo $valid;
if ($valid == true) {
    // dans ce cas, tout est ok, on peut démarrer notre session

    // on la démarre :)
    session_start ();
    // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['pwd'] = $_POST['pwd'];

    setcookie("valid", "true", [
        'path' => '/',
        'domain' => 'localhost',
        'samesite' => 'Lax'
    ]);

    }
    else {
        setcookie("valid", "false", [
            'expires' => time() + (86400 * 30),
            'path' => '/',
            'domain' => 'localhost',
            'samesite' => 'Lax'
        ]);
    
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    // echo '<script type="text/javascript">alert("Le login ou le mot de passe est incorrect...");</script>';
    // puis on le redirige vers la page d'accueil
    // echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
} else {
echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>