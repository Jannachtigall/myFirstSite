<!doctype html>
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

  <title>Регистрация</title>
</head>

<body>
<?php
  $mysql = new mysqli("localhost", "root", "", "abiturabd");
  $mysql->query("SET NAMES 'utf8'");

  if ($mysql->connect_error) {
    echo 'Error Number: ' . $mysql->connect_errno . '<br>';
    echo 'Error: ' . $mysql->connect_error;
  }

  $result = $mysql->query("SELECT * FROM `Направление подготовки`");

  $mysql->close();
  ?>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-between">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="index.php">KFUIT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="calculating.php">Калькулятор</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacts.php">Контакты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="institutes.php">Институты</a>
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

  <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" language="javascript">
    function call(){
      var msg = $('#formx').serialize();
        $.ajax({
          type: 'POST',
          url: 'functions.php',
          data: msg,
          success: function(data){
            $('#results').html(data);
            document.getElementById("no").hidden = false;
          },
          error: function(xhr, str){
            alert("Ошибка!");
          }
        });
    }
  </script>
  <form id="formx" action="javascript:void(null)" method="POST" onsubmit="call()">
    <section>
      <div class="container my-5">
        <div class="row mb-4">
          <div class="col-lg-12 mt-5 text-center">
            <img src="images/imb.png" alt="..." width="170" height="165">
          </div>
          <div class="col-lg-12 mt-4 text-center">
            <h2>Регистрация</h2>
            <p class="lead">Здесь вы можете зарегистрироваться в системе и подать документы на поступление.
            </p>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-12 my-3">
            <h4>Личные данные</h4>
          </div>
          <div class="col-lg-4">
            <label for="lastName" class="form-label">Фамилия</label>
            <input required type="text" name="last_name" class="form-control" id="lastName">
            <div class="invalid-feedback">
              Данное поле обязательно для заполнения.
            </div>
          </div>
          <div class="col-lg-4">
            <label for="firstName" class="form-label">Имя</label>
            <input required type="text" name="first_name" class="form-control" id="firstName">
            <div class="invalid-feedback">
              Данное поле обязательно для заполнения.
            </div>
          </div>
          <div class="col-lg-4">
            <label for="secondName" class="form-label">Отчество</label>
            <input type="text" name="second_name" class="form-control" id="secondName">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-4">
            <label for="gender" class="form-label">Пол</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" checked="checked" value="мужской">
                <label class="form-check-label" for="inlineRadio1">Мужской</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="женский">
                <label class="form-check-label" for="inlineRadio2">Женский</label>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <label for="birthday" class="form-label">Дата рождения</label>
            <input required id="birthday" name="birthday" type="date" class="form-control">
            <div class="invalid-feedback">
              Данное поле обязательно для заполнения.
            </div>
          </div>
          <div class="col-lg-4">
            <label for="passport" class="form-label">Серия и номер паспорта</label>
            <input required id="passport" name="passport" type="text" class="form-control">
            <div class="invalid-feedback">
              Данное поле обязательно для заполнения.
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-12">
            <label for="whoTook" class="form-label">Кем выдан паспорт</label>
            <input required id="whoTook" name="pasport_department" type="text" class="form-control">
            <div class="invalid-feedback">
              Данное поле обязательно для заполнения.
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-8">
            <label for="username" class="form-label">Эл. почта</label>
            <div class="input-group has-validation">
              <input required type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Данное поле обязательно для заполнения.
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <label for="username" class="form-label">Номер телефона</label>
            <div class="input-group has-validation">
              <span class="input-group-text">+7</span>
              <input required type="tel" name="phone_number" class="form-control col-md-6" id="phoneNumber">
              <div class="invalid-feedback">
                Данное поле обязательно для заполнения.
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-12">
            <label for="address" class="form-label">Домашний адрес</label>
            <input required type="text" name="address" class="form-control" id="adress">
            <div class="invalid-feedback">
              Данное поле обязательно для заполнения.
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <hr class="my-4">
          <h4 class="mb-3">Результаты ЕГЭ</h4>
          <label for="state" class="form-label">Укажите ваши действительные результаты ЕГЭ</label>
          <div class="col-lg-4">
            <div class="input-group mb-3">
              <label class="input-group-text col-5" for="inputGroupSelect01">Русский язык</label>
              <input required type="text" name="russian_lang" class="form-control" aria-label="Ввод текста с помощью раскрывающейся кнопки" placeholder="Результат" id="rus_lang">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="input-group mb-3">
              <label class="input-group-text col-5" for="inputGroupSelect02">Математика</label>
              <input required type="text" name="math" class="form-control" aria-label="Ввод текста с помощью раскрывающейся кнопки" placeholder="Результат" id="math">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="input-group mb-3">
              <label class="input-group-text col-5" for="inputGroupSelect04">Иностранный язык</label>
              <input type="text" name="foreign_lang" class="form-control" aria-label="Ввод текста с помощью раскрывающейся кнопки" placeholder="Результат" id="forlang">
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-4">
            <div class="input-group mb-3">
              <label class="input-group-text col-5" for="inputGroupSelect05">Информатика</label>
              <input type="text" name="inf_tech" class="form-control" aria-label="Ввод текста с помощью раскрывающейся кнопки" placeholder="Результат" id="info">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="input-group mb-3">
              <label class="input-group-text col-5" for="inputGroupSelect09">Физика</label>
              <input type="text" name="phys" class="form-control" aria-label="Ввод текста с помощью раскрывающейся кнопки" placeholder="Результат" id="phis">
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <hr class="my-4">
          <h4 class="mb-3">Доп. баллы</h4>
          <div class="col-lg-12">
            <div class="form-check">
              <input type="checkbox" name="gto" class="form-check-input" id="gto" value="gto">
              <label class="form-check-label" for="same-address">Золотой знак отличия ГТО</label>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-check">
              <input type="checkbox" name="certificate" class="form-check-input" id="attestat" value="certificate">
              <label class="form-check-label" for="save-info">Аттестат с отличием</label>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-check">
              <input type="checkbox" name="sport_master" class="form-check-input" id="ms" value="sport_master">
              <label class="form-check-label" for="save-info">Звание мастера спорта</label>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <hr class="my-4">
          <h4 class="mb-3 text-start py-2">Выберете, куда бы вы хотели подать документы</h4>
          <div class="col-lg-6">
            <label for="state" class="form-label">Направление подготовки</label>
            <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="spec">
              <!-- <option selected>-- Выбрать направление подготовки --</option> -->
              <?php while ($data = $result->fetch_assoc()) { ?>
                <option><?php echo $data['Name'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-lg-6">
            <label for="state" class="form-label">Основа обучения</label>
            <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="studying_base">
              <option selected>Бюджет</option>
              <option>Контракт</option>
            </select>
          </div>
        </div>

        <div class="row mb-4">
          <hr class="my-4">
          <div class="col-lg-12">
            <input class="w-100 btn btn-primary btn-lg" type="submit" , name="submit" , value="Подать документы">
          </div>
        </div>

      </div>
    </section>
  </form>

  <div class="modal" id="no" hidden>
    <div class="modal-window">
      <h1><span id="result-title">Результат</span></h1>
      <p id="results">Как вы сюда попали?</p>
      <button class="btn-close" id="close" onclick=closeModal()></button>
    </div>
    <div class="overlay"></div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021–2022 Логинов Сергей</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://yandex.st/jquery/2.1.0/jquery.min.js"></script>
  <script src="scripts/2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>