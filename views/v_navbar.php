<header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <div class="container-fluid">
                 <!--LOGO-->  
              <a class="navbar-brand" href="#">
                <img src=<?=OTHER_IMAGES."HLC_1.png"?> width="70" >
              </a>
                <!--end LOGO-->  
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--LEFT SIDE-->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                  <!--end products--> 
                  <li class="nav-item">
                    <a class="nav-link disabled text-light fst-italic">Treat yourself! You deserve it</a>
                  </li>
                </ul>
                <!--END LEFT SIDE-->
                <!--RIGHT SIDE-->
                <ul class="navbar-nav mb-1 me-lg-5 mb-lg-0">

                          <?php
                            if(isset($_COOKIE['username']))
                            {?>
                              <a class="nav-link disabled text-light">Bonjour <?=strtoupper($_COOKIE['username']) ?></a>
                            <?php
                            }
                          ?>
                      <!--shopping bag-->    
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?action=bag">
                          <img src=<?=OTHER_IMAGES.'bag.png'?> width="40" height="40">
                      </a> 
                    </li>  
                  <!--end shopping bag--> 
                   <!--USER--> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src=<?=OTHER_IMAGES.'user.png'?> width="40" height="40">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            if(!isset($_COOKIE['username']))
                            {
                              ?>
                              <li><a class="dropdown-item" href="index.php?action=login">Connexion</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="index.php?action=register">Inscription</a></li>
                              <?php
                            }
                            else
                            {?>
                              <li><a class="dropdown-item" href="index.php?action=home&logout=true">Déconnexion</a></li>
                            <?php
                            }


                        ?>
                        
                        
                        </ul>
                    </li>
                </ul>
                <!-- END RIGHT SIDE-->
              </div>
            </div>
          </nav>
    </header>