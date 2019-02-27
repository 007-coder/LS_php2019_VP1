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

    parse_str($parseUrl['query'],$parseUrlQuery);    

    // Новый мегаалгоритм разбора URL query. Встревчайте))
    // Вот он какой зверь во всем своем величии.. 
    $posCounter = 0;
    foreach ($parseUrlQuery as $sectionKey => $sectionValue) {          
      $posCounter++;

      $return['query'][$sectionKey] = $sectionValue;

      if (!in_array($sectionKey, $valid_queries)) {
        $return['query']['other']['query'] .= 
          '&' . $sectionKey . '=' . $sectionValue;
        $return['query']['other']['count']++;
      } else {
        $return['positions'][$sectionKey] = $posCounter;
      }

    }

  }

  return $return;
}
