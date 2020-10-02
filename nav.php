
<nav class="navbar navbar-expand-lg navbar-light navbar-absolute bg-light fixed-top">
    <a class="navbar-brand" href="../login/index.php" title="Pagina inicial">BSN FIT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mr-right"> 
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0" action="pesquisa.php" method="GET"  >
                    
                <div class="btn-group dropright">
                        <input type="search" class="form-control  mr-sm-0" placeholder="Pesquise alunos" name="pesquisa"  aria-label="Search" aria-describedby="button-addon2" style=" border-bottom-right-radius: 0; border-top-right-radius: 0;">                      
                        <div class="input-group-append">
                            <button class="btn btn-outline-info btn-sm"  type="submit" id="button-addon2"    style=" border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class="material-icons">search</i></button>
                    </div>
                    </div>
                </form> 
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../login/editarPersonal.php">Perfil</a>
                    <a class="dropdown-item" href="../logout.php">Sair</a>
                </div>
            </li>

        </ul>

    </div>
</nav>




