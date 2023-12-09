<?php
    $firstname_form = $_POST['first_name'];
    $lastname_form = $_POST['last_name'];
    $secondname_form = $_POST['second_name'];
    $gender_form = $_POST['gender'];
    $birthday_form = $_POST['birthday'];
    $passport_form = $_POST['passport'];
    $passport_department_form = $_POST['pasport_department'];
    $email_form = $_POST['email'];
    $phone_number_form = $_POST['phone_number'];
    $address_form = $_POST['address'];
    $spec_form = $_POST['spec'];
    $base_form = $_POST['studying_base'];

    $russian_lang = intval($_POST['russian_lang']);
    $math = intval($_POST['math']);
    $foreign_lang = intval($_POST['foreign_lang']);
    $inf_tech = intval($_POST['inf_tech']);
    $phys = intval($_POST['phys']);
    $ex_result = $russian_lang + $math;

    $gto = $_POST['gto'];
    if ($gto != "") $ex_result += 2;
    $certificate = $_POST['certificate'];
    if ($certificate != "") $ex_result += 10;
    $sport_master = $_POST['sport_master'];
    if ($sport_master != "") $ex_result += 5;

    // Тут начинаеются sql запросы

    $mysql = new mysqli("localhost", "root", "", "abiturabd");
    $mysql->query("SET NAMES 'utf8'");

    if ($mysql->connect_error) {
      echo 'Error Number: ' . $mysql->connect_errno . '<br>';
      echo 'Error: ' . $mysql->connect_error;
      exit;
    }

    $spec = '"' . $mysql->real_escape_string($spec_form) . '"';
    $result = mysqli_fetch_row( $mysql->query("SELECT COUNT(*) FROM `Предмет_Спек` WHERE Spec=$spec"))[0];
    if ($result == 3) {
      $ex_result += max($foreign_lang, max($inf_tech, $phys));
    } else if ($result == 2){
      $ex_result += max($inf_tech, $phys);
    } else {
      $ex_result += $inf_tech;
    }

    $base = '"' . $mysql->real_escape_string($base_form) . '"';
    $listnum = mysqli_fetch_row($mysql->query("SELECT Number FROM `Список поступающих` WHERE Spec=$spec AND Base=$base"))[0];

    $firstname = '"' . $mysql->real_escape_string($firstname_form) . '"';
    $lastname = '"' . $mysql->real_escape_string($lastname_form) . '"';
    $secondname = '"' . $mysql->real_escape_string($secondname_form) . '"';
    $gender = '"' . $mysql->real_escape_string($gender_form) . '"';
    $birthday = '"' . $mysql->real_escape_string($birthday_form) . '"';
    $passport = '"' . $mysql->real_escape_string($passport_form) . '"';
    $passport_department = '"' . $mysql->real_escape_string($passport_department_form) . '"';
    $email = '"' . $mysql->real_escape_string($email_form) . '"';
    $phone_number = '"' . $mysql->real_escape_string($phone_number_form) . '"';
    $address = '"' . $mysql->real_escape_string($address_form) . '"';

    $query = "INSERT INTO `Абитуриент` (Id, LastName, FirstName, SecondName, Gender, 
    Birthdate, Passport, PassportDepartment, Email, PhoneNumber, HomeAddress, Score, ListNumber) 
    VALUES (generate_id($listnum), $lastname, $firstname, $secondname, $gender, 
    $birthday, $passport, $passport_department, $email, $phone_number, $address, $ex_result, $listnum)";

    if ($mysql->query($query) === TRUE) {
      echo "Данные успешно отправлены!";
    } else {
      echo "Ошибка: " . $mysql->error;
    }

    $mysql->close();
?>