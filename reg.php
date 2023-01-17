<?php
// Таблица с пользователями
$users = [
    ['id'=>1,'name'=>'John Connor','email'=>'j@mail.com','password'=>123],
    ['id'=>2,'name'=>'Joseph Biden','email'=>'biden@white.gov','password'=>'my_best_pass'],
    ['id'=>3,'name'=>'test','email'=>'test@ukr.net','password'=>'aaa123']
];
// Файл длялогирования
$log_file = 'logs.txt';
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
// ответы - 0: все отлично, 1: не совпадают пароли, 2: емейл занят, 3: заполнить поля

// проверка на заполненность полей
if(empty($pass1) or empty($pass2) or strpos($email,'@')===false){
    file_put_contents($log_file, date("Y-m-d H:i:s")." - Провал:$email: Не заполнены данные\n" ,FILE_APPEND);
    echo 3; exit;
}
// проверка на идентичность паролей
if($pass1 != $pass2){
    file_put_contents($log_file, date("Y-m-d H:i:s")." - Провал:$email: Не совпадают пароли\n" ,FILE_APPEND);
    echo 1; exit;
}
// проверка на повтор емейла
if(in_array($email, array_column($users,'email'))){
    file_put_contents($log_file, date("Y-m-d H:i:s")." - Провал:$email: Такой email есть в базе\n" ,FILE_APPEND);
    echo 2; exit;
}

file_put_contents($log_file, date("Y-m-d H:i:s")." - Успех:$email: Зарегистрирован\n" ,FILE_APPEND);
echo 0;
