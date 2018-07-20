<?php

ini_set('max_execution_time', 300000000); //300 seconds = 5 minutes
// file_get_contents call instead


 $data = file_get_contents ("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=1&_tel=671200153&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");

 $json = json_decode($data, true);
  $temperatureMin= $json['StatusCode'];
	   
	   echo $temperatureMin;