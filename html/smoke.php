<?php
       if (isDomainAvailible('http://87.236.23.103'))
       {
               
               echo "It's ok \n";
       }
       else
       {
               echo "We have a probem \n";
       };

       //Возвращает true, если домен доступен
       function isDomainAvailible($domain)
       {
               //Инициализация curl
               $curlInit = curl_init($domain);
               curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
               curl_setopt($curlInit,CURLOPT_HEADER,true);
               curl_setopt($curlInit,CURLOPT_NOBODY,true);
               curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

               //Получаем ответ
               $response = curl_exec($curlInit);
//               echo($response);
               curl_close($curlInit);
	       $res_code = mb_substr($response, 9, 4);
               echo("HTTP status code: ");
               echo($res_code);
               if ($res_code==200){ 
                    return true;
               }
               else{
                    return false;
               };

       }
?>
