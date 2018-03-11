
 <div class="layoutsidebar fl col-xs-12 col-sm-12  col-md-2">
 
     <?php  require_once HERE_ROOT.'mod_block/tpl_block_sidebar.php'; ?>

</div>

 <div class="fl col-xs-12 col-sm-12  col-md-10">
    <?php  
 if($type=='') echo '请先在左边选择';
    else{
        if($act<>'list'){
            echo '<div style="background:#f3f7fc;padding:8px;font-size:14px;font-weight:bold">';
            if($act=='add') echo '添加';
            else {
                echo '修改';
                if($type=='blockdh'){

                    //num_subnode($table,$field,$value)
                   // $num = num_subnode(TABLE_NODE,'pid',$pidname);

                   // echo ' <a style="display:inline-block;padding:5px;border-radius:6px;background:#DCE8F4" href="../mod_node/mod_blockdh.php?lang='.LANG.'&pid='.$pidname.'">区块的内容管理 ('.$num.')</a>';
                    //mod_node/mod_blockdh.php?lang=cn&catpid=cate20160707_0437114782&page=0&catid=csub20171212_1153095561
                }
            }
            echo '</div>';
        }
       require_once HERE_ROOT.'mod_block/tpl_block_m_'.$type.'.php'; 

       if($act=='' || $act=='list'){        
             require_once HERE_ROOT.'mod_block/tpl_block_list.php'; 
        }
        
    }
    ?>
 </div>


<div class="c"> </div>
