 <?php

$sql = "SELECT * from ".TABLE_CATE." where pid='$pidcate' and alias_jump='' and sta_visible='y' $andlangbh order by pos desc,id";
$fecatenum = getnum($sql);
if($fecatenum==0) {echo '没有cate记录。';
$result_cate = array();
}
else  $result_cate = getall($sql);


$sqlnode="select * from ".TABLE_NODE." where ppid='$pidcate' and sta_visible='y' $andlangbh  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
if($fenum==0) {echo '没有记录。--'.$pidcate;
$result = array();
}
else  $result = getall($sqlnode);

?>

 <?php
edit_fenode($pidcate);//用来在前台编辑后台。
?>

      <div class="work-filter diviso_filter_bk">


        <a href="#"  data-filter="*"  class="active">所有</a>
          <?php
           if($fecatenum>0){

              foreach($result_cate as $v){
                $name = decode($v['name']); $pidname = $v['pidname'];
                ?>
            <a href="#" data-filter=".<?php echo $pidname?>" class=""><?php echo $name?></a>
                <?php
                       }
                    }
              ?>




      </div>


     <div class="grid2ceng isotope  gridlistiso_bk">
         <ul>
<?php
 if($fenum>0){
        foreach($result as $v){
          $tid=$v['id'];
          $pid=$v['pid'];
        $level  =  get_field(TABLE_CATE,'level',$pid,'pidname');

        if($level==1) $filter = $pid;
        else {
          $pidhere  =  get_field(TABLE_CATE,'pid',$pid,'pidname');
          $filter = $pidhere;
        }

      $title=$v['title'];$alias_jump=$v['alias_jump'];
      $titlecss=$v['titlecss'];
      $pidname=$v['pidname'];
      $dateday=$v['dateday'];//echo $listdate;
      $alias=alias($pidname,'node');

	 $imgv =  get_img_def($v['kvsm']);
    $linkurl = url('node',$alias,$tid,$alias_jump);

?>




  <li class="<?php echo $filter;?> isotope-item  boxcol gcoverlayjia  <?php echo $cus_columnsvBoot;?>">
     <a  href="<?php echo $linkurl?>">
         <div class="overlay"><span>+</span></div>
           <div class="img">
              <img src="<?php echo $imgv?>" alt="<?php echo $title?>">
            </div>
           <h3><?php echo $title?></h3>
    </a>
</li>




<?php
  }
  }
?>

   </ul>

  </div>

<?php
getJsSingle(TPLBASEPATH.'assets/vendor/singlejs/isotope.pkgd.min.js');
?>

    <script>
$(function(){


			//--------ISOTOPE----------
			var diviso_items = $('.gridlistiso_bk');
			// initialize isotope
			diviso_items.isotope({
			  itemSelector : '.isotope-item',
			  layoutMode : 'fitRows'
			});

			// filter items when filter link is clicked
			$('.diviso_filter_bk a').click(function(){
			  $('.diviso_filter_bk a').removeClass('active');
			  $(this).addClass('active');
			  var selector = $(this).attr('data-filter');
			  diviso_items.isotope({ filter: selector });
			  return false;
			});
			//--------END ISOTOPE----------


		//---------end load------------
        });
   </script>
