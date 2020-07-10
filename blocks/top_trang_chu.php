		<div id="slide-left">
			<?php
				$tinmoinhat_mot = TinMoiNhat_MotTin();
				$row_tinmoinhat_mot = mysqli_fetch_array($tinmoinhat_mot,MYSQLI_BOTH);
			?>
        	<div id="slideleft-main">
                <img width="500" height="300" src="upload/tintuc/<?php echo $row_tinmoinhat_mot["urlHinh"]?>"  /><br />
                <h2 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mot["idTin"]?>">
				<?php echo $row_tinmoinhat_mot["TieuDe"]?></a> </h2>
                <div class="des">
                   <?php echo $row_tinmoinhat_mot["TomTat"]?>
                </div>
                <?php 
				$tinmoinhat_batin = TinMoiNhat_BaTin();
				while($row_tinmoinhat_batin = mysqli_fetch_array($tinmoinhat_batin,MYSQLI_BOTH)) {
				?>
            	<p class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_batin["idTin"]?>">
				<?php echo $row_tinmoinhat_batin["TieuDe"]?></a></p>
                <?php 
				}
				?>
        	</div>
            <div id="slideleft-scroll">
            	
              <div class="content_scoller width_common">
            <ul>
               <?php
               $tinmoinhat_bon = TinMoiNhat_BonTin();
			   while( $row_tinmoinhat_bon = mysqli_fetch_array($tinmoinhat_bon,MYSQLI_BOTH) ){
			   ?>           
               <li>
                <div class="title_news">
               		<a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_bon["idTin"]?>" class="txt_link">
					<?php echo $row_tinmoinhat_bon["TieuDe"]?></a> 
                </div>
              </li>
              <?php
			   }
			   ?>
            </ul>
            </div>			
            
			<div id="gocnhin">
                <img alt="" src="C:\xampp\htdocs\TinTucVN\images\#" width="10%"></a>
                <div class="title_news"></div>
            </div>
                
            </div>
		</div>


     