<?php
  //возвращает id, в которых есть $searchLine. Поиск с помощью Sphinx
  function getIdBySphinx($searchLine)
  {
    // Подключим файл с api
    include('Sphinx\api\sphinxapi.php');

    // Создадим объект - клиент сфинкса и подключимся к нашей службе
    $cl = new SphinxClient();
    $cl->SetServer( "localhost", 9312 );

    $cl -> open();

    // Собственно поиск
    $cl->SetMatchMode( SPH_MATCH_ANY  ); // ищем хотя бы 1 слово из поисковой фразы
    $result = $cl->Query($searchLine); // поисковый запрос

    // обработка результатов запроса
    if ( $result === false ) { 
          echo "Query failed: " . $cl->GetLastError() . ".\n"; // выводим ошибку если произошла
      }
      else {
          if ( $cl->GetLastWarning() ) {
              echo "WARNING: " . $cl->GetLastWarning() . " // выводим предупреждение если оно было
    ";
          }

          if ( ! empty($result["matches"]) ) { // если есть результаты поиска - обрабатываем их
                return implode(', ', array_keys($result["matches"]));
              }
          else 
            return false;
          }
      
  }