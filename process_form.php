<?php 


if (isset($_POST['engine']) && $_POST['engine'] == 'ajax') {

  $validAjaxActions = ['submitOrder'];  

  if (isset($_POST['action']) && in_array($_POST['action'], $validAjaxActions)) {     

    switch ($_POST['action']) {
      case 'submitOrder':       
        $OrderSubResult = model_submitOrder($dbObj, $_POST);        
        $OrderResult = [
          'user_type' => ($OrderSubResult['user_type'] == 'new') ? 'Добавлен новый пользователь.' : 'Существующий пользователь.',
          'message' => ($OrderSubResult['message'] == 'ok') ? 'Ваш заказ успешно размещен! Аллилуя.. Слава богам!' : 'К сожелению, боги не приняли ваши дары и не разместили ваш заказ! Они сегодня грозные!',
        ];
        
        echo json_encode($OrderResult, JSON_UNESCAPED_UNICODE);
        break;
    }


  }  



  die();
}