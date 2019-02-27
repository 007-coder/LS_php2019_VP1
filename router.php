<?php 
// simple routing

if (isset($_GET) && count($_GET)) {
  $validPages = ['orders', 'clients'];

  $parceUrlQuery = parseUrlQuery(get_actual_url()); 

  if (isset($parceUrlQuery['query']['page']) && in_array($parceUrlQuery['query']['page'], $validPages) && $parceUrlQuery['positions']['page'] === 1 && $parceUrlQuery['query']['other']['count'] === 0) {

    switch ($parceUrlQuery['query']['page']) {
      case 'orders':
        $layout = 'orders.php';        
        $VDorders = model_getOrders($dbObj);
        break;
      case 'clients':
        $layout = 'clients.php';
        $VDclients = model_getClients($dbObj);
        break;      
     
    }

  }

}

?>