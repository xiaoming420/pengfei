<div class="taggrid grid2ceng imghg210">
  <ul>

<?php 


	    $sqllist22 = "SELECT node from ".TABLE_TAGNODE." where  tag='$tagpidname'   $andlangbh  order by  id desc";
 // echo $sqllist22; 
  /*begin page roll*/
  
  
     $num_rows = getnum($sqllist22);
	  $page_total=ceil($num_rows/$maxline);//must put here,because when no data,we need the vaule of page_total	
     if($num_rows>0){
         // $page_total=ceil($num_rows/$maxline);//not put here
        //if (!isset($page)||($page<=0)) $pagesql=1;//this is in common.inc
        if($page>$page_total) $pagesql=$page_total;
        $start=($pagesql-1)*$maxline;
        $sqllist33="$sqllist22  limit $start,$maxline";
	 // ECHO $sqllist33; 		 
        $result = getall($sqllist33);	


				 foreach($result as $v){

				 		$nodepidname = $v['node'];
				 		//echo $nodepidname;

		   $sqllist22 = "SELECT * from ".TABLE_NODE." where  pidname='$nodepidname'   $andlangbh  limit 1";
 			if(getnum($sqllist22)>0){
 					$v = getrow($sqllist22);

 					 $tid = $v['id']; $titlecss = $v['titlecss'];
			        $title = $v['title'];$hit = $v['hit'];
			        $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
			        
			        $imgv =  get_img_def($v['kvsm']);
			       
			        $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],100);       

			 
			        $alias=alias($pidname,'node');  
			         $linkurl = url('node',$alias,$tid,$alias_jump);

			          // if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
		  			//else $titlecssv='';

			         ?>


 <li class="boxcol col-md-3 col-sm-4 gcoverlayjia">
     <a  <?php echo linktarget($linkurl);?>   href="<?php echo $linkurl?>">
         <div class="overlay"><span>+</span></div>
           <div class="img">
              <img src="<?php echo $imgv?>" alt="<?php echo $title?>">
            </div>
           <h3><?php echo $title?></h3>
    </a> 
</li>								

	  <?php
 

 			}//end getnum
           
       
        // $linkurlarr =  get_nodelinkurl($linkurl);

   }

	 
     }//end $num_rows>0
	
    else{
	   echo  NOARTICLE;
	}?>


<?php
require_once EFFECTROOT.'other/plugin_pager.php';
 ?>
 
</ul>
</div>
 