<ul>
<?php 
foreach ($arr_block  as $k => $v) {
  $stylev = '';
  if($type==$k)  $stylev = ' style="background:red;color:#fff"';
    echo '<li><i class="fa fa-caret-right"></i> <a '.$stylev.'  href="'.$jumpv.'&type='.$k.'">'.$v.'></a></li>';
}
 
?>
  

</ul>


<div   style="padding-top:8px">
<?php 
 
    $linkview = admlink('dmlink-blockview-custom.html');
    echo '<a  target="_blank" href="'.$linkview.'"><i class="fa fa-caret-right"></i>预览公共区块</a>';
  
  ?>
</div>

