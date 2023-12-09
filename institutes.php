<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap">

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link rel="stylesheet" href="styles/styles.css">

  <link rel="apple-touch-icon" sizes="180x180" href="files/lil/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="files/lil/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="files/lil/favicon-16x16.png">
  <link rel="manifest" href="files/lil/site.webmanifest">

  <title>Институты</title>
</head>

<body>

  <?php
  $mysql = new mysqli("localhost", "root", "", "abiturabd");
  $mysql->query("SET NAMES 'utf8'");

  if ($mysql->connect_error) {
    echo 'Error Number: ' . $mysql->connect_errno . '<br>';
    echo 'Error: ' . $mysql->connect_error;
  }

  $result = $mysql->query("SELECT * FROM `Институт`");

  $mysql->close();
  ?>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="index.php">KFUIT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calculating.php">Калькулятор</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacts.php">Контакты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="institutes.php">Институты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Lists.php">Списки</a>
            </li>
          </ul>
          <a href="WebForm.php"><button class="btn btn-primary my-2 mx-5 my-sm-0" href="WebForm.php" type="submit">Регистрация</button></a>
        </div>
      </div>
    </nav>
  </header>

  <section>
    <div class="container my-5">
      <div class="row text-center">
        <div class="col-lg-12 mt-5">
          <img src="images/imb.png" alt="..." width="170" height="165">
        </div>
        <div class="col-lg-12 mt-4">
          <h2>Институты</h2>
          <p class="lead">Здесь вы можете узнать всю информацию об институтах КФУ, <br>которые имеют направления подготовки, связанные с IT.
          </p>
        </div>
      </div>
        <div class="row">
          <?php while ($data = $result->fetch_assoc()) { ?>
            <div class="col-lg-4">  
              <form method="GET" action="institute_info.php" style="height: 100%;">
                <div class="card" style="height: 100%;">
                  <img class="card-img-top" src="images/<?php echo $data['Image'] ?>" alt="Card image cap">
                  <div class="card-body">
                    <input type="hidden" name="institute" value="<?php echo $data['Name']?>">
                    <h5 class="card-title"><?php echo $data['Name']?></h5>
                    <input type="hidden" name="description" value="<?php echo $data['Description']?>">
                    <p class="card-text" style="height: 100%;"><?php echo $data['Description'] ?></p>
                  </div>
                  <input class="w-100 btn btn-primary btn-lg" type="submit" , name="submit" , value="Подробнее">
                </div>
              </form>
            </div>
          <?php } ?>
        </div>
    </div>
  </section>


  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021–2022 Логинов Сергей</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>