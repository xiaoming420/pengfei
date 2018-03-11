
<div class="ftmobnav">

    <nav>
        <div id="ftmobnav_ul" class="box">
            
               <?php
			      echo $despv;
			   ?>
            

 

        </div>
    </nav>
    
    <div id="ftmobnav_masklayer" class="masklayer_div on">&nbsp;</div>

</div>
<script type="text/javascript">



var ftmobnav =(function(){
    bindClick = function(els, mask){
        if(!els || !els.length){return;}
        var isMobile = "ontouchstart" in window;
        for(var i=0,ci; ci = els[i]; i++){
            ci.addEventListener("click", evtFn, false);
        }

        function evtFn(evt, ci){
            ci =this;
            for(var j=0,cj; cj = els[j]; j++){
                if(cj != ci){
                   // console.log(cj);
                    cj.classList.remove("on");
                }
            }
            if(ci == mask){mask.classList.remove("on");return;}
            switch(evt.type){
                case "click":
                    var on = ci.classList.toggle("on");
                    mask.classList[on?"add":"remove"]("on");
                break;
            }
        }
        mask.addEventListener(isMobile?"touchstart":"click", evtFn, false);
    }
    return {"bindClick":bindClick};
})();

//if($('body').width()<800){  //use php 
    $('.ftmobnav').show();
ftmobnav.bindClick(document.getElementById("ftmobnav_ul").querySelectorAll("li>a"), document.getElementById("ftmobnav_masklayer"));
//}
</script>

 