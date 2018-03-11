<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<ul class="textlist">
<?php
foreach($result as $v){
            $tid=$v['id'];
			$title=$v['title'];
			$titlecss=$v['titlecss'];
			$pidname=$v['pidname'];
		 
			$dateedit= substr($v['dateedit'],0,10);

			$alias=alias($pidname,'node');  
            $kvsm=$v['kvsm'];$alias_jump=$v['alias_jump'];
			$despjj=$v['despjj'];

			   $desp= web_despdecode($v['desp']);
                $desptext= web_despdecode($v['desptext']);
                 $despv='';
                 if($desptext<>'') $despv = $desptext;
                else  $despv = $desp; 
                $despv22 = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';
 
            
            $addr2 =  get_img($kvsm,$title,'nodiv');
            $url = url('node',$alias,$tid,$alias_jump);

          if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
		  else $titlecssv='';

		   if(substr($alias_jump,0,4)=='http') $targetblank = ' target="_blank"';
		   else  $targetblank = '';

            if($kvsm<>""){
          
                echo '<li class="hasimg">';
				echo '<a class="img"'.$targetblank.' href="'.$url.'" '.$titlecssv.'><img src="'.$addr2.'" alt="'.$title.'" /></a>';
				echo '<div class="text">';
				echo '<h4>';
				echo '<span class="day">'.$dateedit.'</span>';
				 echo '<a '.$targetblank.' href="'.$url.'" '.$titlecssv.'>'.$title.'</a>';
				echo '</h4>';
				//echo '<p class="textshort">'.web_despdecode($despjj).'</p>';
				echo '<p class="textshort">'.$despv22.'</p>';	
					
				echo '</div>';
				echo '</li>';

            }
            else{
             echo '<li class="noimg">';
			 	echo '<div class="text">';
				echo '<h4>';
			    echo '<span class="day">'.$dateedit.'</span>';
			    echo '<a '.$targetblank.' href="'.$url.'" '.$titlecssv.'>'.$title.'</a>';
			    echo '</h4>';
				echo '<p class="textshort">'.$despjj.'</p>';		
				echo '</div>';
			 echo '</li>'; 
            }

        }//end foreach

?>
</ul>