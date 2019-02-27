<?php 

function model_submitOrder($db, $data) {  
  $query1 = "SELECT user_id FROM `users` WHERE email='".$data['email']."' ";

  // Это жопа а не синтаксис.. вот поэтому я и не люлю PDO слишком
  // все сложно и через одно метсто!
  // Почему я должен писать 3 строки кода и помнить в 3 раза больше 
  // синтаксиса, если можно обойтись 1 строкой кода, используя 
  // мою обертку для БД!!?? Зачем так усложнять жизнь?
  $stmt = $db->prepare($query1);
  $stmt->execute();
  $user = $stmt->fetch(\PDO::FETCH_ASSOC);  

  $result = [
    'user_type'=> (isset($user['user_id'])) ? 'exists' : 'new',
    'message' => 'error'
  ];

  if ($user['user_id']) {

    $query2 = "INSERT INTO `orderx` (user_id, comment, name, phone, email, street, home, part, appt, floor, payment, callback) VALUES (
    '".$user['user_id']."','".$data['comment']."', '".$data['name']."', '".$data['phone']."', '".$data['email']."', '".$data['street']."',
    '".$data['home']."', '".$data['part']."', '".$data['appt']."', '".$data['floor']."', '".$data['payment']."', '".$data['callback']."'
    )";

    $stmt = $db->prepare($query2);
    $stmt->execute();       
    $result['message'] = 'ok';

  } else {

    $query2 = "INSERT INTO `users` (email) VALUES ( '".$data['email']."' )";
    $stmt = $db->prepare($query2);
    $stmt->execute();


    $stmt = $db->prepare($query1);
    $stmt->execute();
    $newUser_id = $stmt->fetch(\PDO::FETCH_ASSOC);

    $query3 = "INSERT INTO `orderx` (user_id, comment, name, phone, email, street, home, part, appt, floor, payment, callback) VALUES (
    '".$newUser_id['user_id']."','".$data['comment']."', '".$data['name']."', '".$data['phone']."', '".$data['email']."', '".$data['street']."',
    '".$data['home']."', '".$data['part']."', '".$data['appt']."', '".$data['floor']."', '".$data['payment']."', '".$data['callback']."'
    )";   

    $stmt = $db->prepare($query3);
    $stmt->execute();
    $result['message'] = 'ok';    

  }

  return $result;
}

function model_getClients($db) {
  $query = "SELECT * FROM `users`";

  $stmt = $db->prepare($query);
  $stmt->execute();
  $clients = $stmt->fetchAll(\PDO::FETCH_ASSOC);

  return $clients;

}

function model_getOrders($db) {  
    $query=" 
    SELECT o.*, u.user_id 
    FROM `orderx` AS o
    LEFT JOIN `users` AS u
    ON o.email  = u.email ";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(\PDO::FETCH_ASSOC);


  return $orders;
}