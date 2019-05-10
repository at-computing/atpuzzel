<?php session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = $_POST["password"];
  if (isset($password)) {
    $fn = fopen("/var/www/passwords.txt","r");
    $succes=False;
    while(! feof($fn))  {
      $validPassword = fgets($fn);
      if  ($password."\n" == $validPassword) {
        $_SESSION["$password"] = TRUE;
        $succes=TRUE;
        break;
      }
    } 
    fclose($fn);
  } 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>at-puzzel</title>

    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="signin.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
  </head>

  <body class="text-center">


    <a href="https://github.com/atcomputing/atpuzzel">
      <img width="149" height="149" style="position:absolute;top:0px" src="images/forkme_left_red_aa0000.png" alt="Fork me on GitHub" >
    </a>
    <form class="form-signin"  method="post" >
      <img class="mb-4" src="images/atcomputing.png" alt="" height="60">
      <h1 class="h5 mb-3 font-weight-normal">Vul het wachtwoord in...</h1>
      <label for="inputPassword" class="sr-only">Wachtwoord</label>

      <?php if (isset($succes) and ! $succes ){ ?>
      <div class="alert alert-warning" role="alert">
        verkeerde wachtwoord
      </div>
      <?php } ?>

      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Wachtwoord" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit"  value="Submit" >Log in</button>
    </form>
   </form>
  <?php if ($succes) {?>
  <!-- Modal -->
  <div class="modal" id="prompt" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Succes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          je hebt een wachtwoord gevonden (<?php echo count($_SESSION);?>/7)
        </div>
      </div>
    </div>
  </div>
  "<script> $('#prompt').modal('show') </script>" ;
  <?php } ?>

  <!-- hier is alvast het eerste van totaal zeven wachtwoorden: Bootstrap_Rulez
  Dit wachtwoord was natuurlijk wel erg makkelijk te vinden. Dus, hup! Zoeken naar die andere zes....
  versie 0.3
  -->
  </body>
</html>

