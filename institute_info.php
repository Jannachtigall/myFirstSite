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

  <title>Приветствуем</title>
</head>

<body>

  <?php
  $institute = $_GET['institute'];
  $description = $_GET['description'];

  $mysql = new mysqli("localhost", "root", "", "abiturabd");
  $mysql->query("SET NAMES 'utf8'");

  if ($mysql->connect_error) {
    echo 'Error Number: ' . $mysql->connect_errno . '<br>';
    echo 'Error: ' . $mysql->connect_error;
  }

  $spec_result = $mysql->query("SELECT * FROM `Направление подготовки` WHERE Institute='$institute'");
  $department_result = $mysql->query("SELECT * FROM `Кафедра` WHERE InstituteName='$institute'");

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
          <h2><?php echo $institute ?></h2>
          <p class="lead">Здесь вы можете узнать всю интересующую вас информацию про <?php echo $institute ?>.
          </p>
        </div>
      <div class="row text-start">
        <div class="col-lg-12 mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Описание</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Направления подготовки</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Кафедры</button>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p><?php echo $description; ?></p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php while ($data = $spec_result->fetch_assoc()) { ?>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="card p-2">
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $data['Name'] ?></h5>
                                        <small>Результат прошлого года: <?php echo $data['LastScore'] ?> баллов</small>
                                    </div>
                                    <small><?php echo $data['Description']?></small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">                <?php while ($new_data = $department_result->fetch_assoc()) { ?>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="card p-2">
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $new_data['Name'] ?></h5>
                                        <small>Руководитель: <?php echo $new_data['Leader'] ?></small>
                                    </div>
                                    <small><?php echo $new_data['Description']?></small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
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