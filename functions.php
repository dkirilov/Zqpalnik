<?php

      function custom_exception_handler(Throwable $ex){
		        if(!DEV_MODE && ($ex->getCode() == 404)){
					  \core\Template::render404(DEFAULT_TEMPLATE);
				}else{		  
						 echo "<div style='margin-top: 90px;'>". 
						           "<h2>Something is going wrong!</h2><br>" .
									"<b>ERROR CODE:</b> " . $ex->getCode().
									"<br><b>ERROR MESSAGE:</b> ".$ex->getMessage().
									"<br><b>ERROR OCCURED IN FILE:</b>  ".$ex->getFile().
									"<br><b>ON LINE:</b>  ".$ex->getLine().
									"</div>";
				}
		}

?>