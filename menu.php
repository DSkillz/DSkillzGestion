<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient animated">
    <div class="container-fluid justify-content-center">
        <li class="col justify-content-center">
            <button type="button" class="myButton btn btn-secondary">BIOS</button>
        </li>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col collapse navbar-collapse justify-content-sm-end" id="navbarTogglerDemo02">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item">
                    <a id="fiche_crea" class="nav-link active" aria-current="page" href="#">Créa fiche</a>
                </li>
                <li class="nav-item">
                    <a id="clients" class="nav-link" href="#">Clients</a>
                </li>
                <li class="nav-item">
                    <a id="list_interv" class="nav-link" href="#">Interventions</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-hover="dropdown" data-delay="1000" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Occasions </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a id="occas_list" class="dropdown-item" href="#" target="_blank">Liste</a></li>
                        <li><a id="occas_add" class="dropdown-item" href="#">Ajouter une fiche occasion</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bloc-Notes</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a id="blocnote_list" class="dropdown-item" href="#" target="_blank">Liste</a></li>
                        <li><a id="blocnote_crea" class="dropdown-item" href="#">Créer un bloc-notes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="quit" class="nav-link" href="#">Quitter</a>
                </li>
            </ul>
            <form class="col-md-4 d-flex">
                <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
</nav>

<script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    $('#fiche_crea').click(function() {
        if (getCookie("valid") === "true") {
            $('main').load('fichecrea.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#clients').click(function() {
        if (getCookie("valid") === "true") {
        console.log('Affichage de clients.php declenche.');
            $('main').load('clients.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#list_interv').click(function() {
        if (getCookie("valid") === "true") {
            $('main').load('intervention_liste.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#occas_list').click(function() {
        if (getCookie("valid") === "true") {
            $('main').load('occasion_liste.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#occas_add').click(function() {
        if (getCookie("valid") === "true") {
            $('main').load('occasion.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#blocnote_list').click(function() {
        if (getCookie("valid") === "true") {
            $('main').load('blocnote_liste.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#blocnote_crea').click(function() {
        if (getCookie("valid") === "true") {
            $('main').load('blocnote.php');
            window.scrollTo(0, 0);
        }
        return false;
    });

    $('#quit').click(function() {
        $('main').load('authform');
        document.cookie = 'valid=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT; SameSite=Lax';
        console.log(document.cookie)
        return false;
    });
</script>