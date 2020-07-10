<div class="txt_timer left" id="clockPC">
<?php
	$timezone  = +7; //(GMT +7:00) 
	echo gmdate("d/m/Y, H:i", time() + 3600*($timezone+date("0")));
?>
</div>	
             <div class="left">
                
             </div>
             <a href="#" class="txt_24h left">GMT+7</a>         
             <div class="block_search_web left">
                <form action="" method="get" target="_blank" id="search">
                   <input name="q" value="" maxlength="80" class="txt_input" type="text">
                   <input value="" class="icon_search_web" type="submit">
                <input name="p" type="hidden" value="timkiem" />
                </form>
             </div>
       
          