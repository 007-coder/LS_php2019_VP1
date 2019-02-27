<?php

function wrap_pre($data, $title = '') {
  $count = ((is_array($data) || is_object($data)) && count($data)) ? ' ('.count($data).') ' : '';
  echo '<pre><h4><b>'.$title.$count.'</b></h4>'.print_r($data, true).'</pre>';
}

function get_actual_url() {
  $actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  return $actual_url;
}


function parseUrlQuery ($url) {
  $valid_queries = ['page'];

  $return = [
    'query'=>[
      'other'=>[
        'query'=>'',
        'count'=>0
      ]
    ],
    'positions'=>[]
  ];  

  $parseUrl = parse_url($url);

  if (!empty($parseUrl['query'])) {

    $explUrlQuery = explode('&', $parseUrl['query']);   
    foreach ($explUrlQuery as $ek => $eVal) {
        $tmp = explode('=',$eVal);

        if (count($tmp)==2) {

          $return['query'][$tmp[0]] = $tmp[1];
        
          if (!in_array($tmp[0], $valid_queries)) {                   
            $return['query']['other']['query'] .='&'.$eVal;
            $return['query']['other']['count']++;

          }

          if (in_array($tmp[0], $valid_queries)) {
            switch ($tmp[0]) {             
              case 'page':
                $return['positions']['page'] = $ek+1;
                break;                  
            } 
          }

        } /*else {
          $return['query']['section'] = 'admin-panel';          
          $return['query']['page'] = '404';         
          $return['positions']['section'] = '1';          
          $return['positions']['page'] = '2';         
        }*/
                

      }

  }


  return $return;
}
