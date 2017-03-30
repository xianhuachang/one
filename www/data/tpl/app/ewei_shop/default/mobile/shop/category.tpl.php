<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title>商品分类</title>
<style type="text/css">
    body {margin:0px;padding:0px; width:100%; height:100%; background:#fff; color:#fff; }
    .topbar {position:fixed;top:0px;width:100%; height:40px;  background:#f9f9f9; border-bottom:1px solid #e8e8e8; font-size:16px; line-height:40px; text-align:center; color:#666;}
    .topbar a {height:40px; width:15px; display:block; float:left; margin-left:10px;outline:0px; color:#999; font-size:24px;}
    .main {position:fixed;top:41px;  height:100%;}
    .search {height:40px;margin-left:30px; color:#ccc; line-height:40px; font-size:14px; text-align:center;}
    #left_container { float:right;width:90px;height:100%;background:#efefef;overflow:auto;}
    #left_container .parent_item {width:94%; padding:0 3%; height:35px;line-height:35px;font-size:13px;float:left; text-align:center; color:#333;}
    #left_container .on {background:#fff;}
    #right_container { float:right;margin-right:-90px;width:100%;height:100%; z-index:1;overflow:auto;}
    #right_container .inner { margin-right: 90px; background:#fff;height:100%;padding:5px 0px 35px 5px;}
    #right_container .inner .category_item { width:27%;float:left;padding:5px;color:#333;font-size:13px; text-align: center;position: relative;}
    #right_container .inner .category_item .name {height:16px;overflow:hidden;width:100%; text-align: center;}
    #right_container .inner img{width:100%;}   
    #right_container .inner .category_no {width:100%;height:100px;color:#333; text-align: center;}   
    #right_container .inner .category_title { color:#999;font-size:13px;padding:10px 0 10px 0;width:100%;float:left;}   
    #right_container .adv { color:#999;font-size:13px;margin:5px;float:left;padding:0;} 
    #right_container .adv img {width:100%;}    
    #category_loading { width:94%;padding:10px;color:#666;text-align: center;float:right;}
    #right_container .inner .special{width: 43%;}
    .onlyshow{width: 100%;height: 100%;position: absolute;top: -1%;right: -1%;z-index: 100;background-color: rgba(0,0,0,0.7);text-align: center;line-height: 90px;color: white;}
</style>


<div id='container'></div>

<script id='tpl_main' type='text/html'>
   <div class="topbar"><a href="javascript:history.back()"><i class="fa fa-angle-left"></i></a>
    <div class='search'><i class="fa fa-search"></i> 在店铺内搜索</div>
   </div>
     <!--搜索-->
    <div class="search1">
                <div class="topbar1">
                    <div class='right'>
                        <button class="sub1"><i class="fa fa-search"></i></button>
                        <div class="home1">取消</div>
                    </div>
                    <div class='left_wrap'>
                        <div class='left'>
                            <input type="text" id='keywords' class="input1" placeholder='搜索: 输入商品关键词' value='<?php  echo $_GPC['keywords'];?>'/>
                        </div>
                    </div>
                </div>
                <div id='search_container' class='result1'>
        </div>
     </div>
     
     
     <div class="main">
       
         <div id="right_container">
             <div class='adv' style='display:none' ><img src='' /></div>
             <div class="inner"></div></div>
         <div id="left_container"></div>
         
     </div>
</script>
<script id='tpl_search_list' type='text/html'>
     <ul>
     <%each list as value%>
        <li><i class="fa fa-angle-right"></i> <a href="<?php  echo $this->createMobileUrl('shop/detail')?>&id=<%value.id%>"><%value.title%></a></li>
        <%/each%>
    </ul> 
</script>
<script id='tpl_parent_list' type='text/html'>
    <div class="parent_item on"  data-cate="rec">推荐分类</div>
    <div class="parent_item"  data-cate="rec_products">推荐产品</div>
    <%each second_categoris as value%>
    <div class="parent_item" data-cate="<%value.id%>" data-advimg='<%value.advimg%>' data-advurl='<%value.advurl%>'>
        <%value.name%>
    </div>
    <%/each%>
</script>

<script id='tpl_child_list' type='text/html'>
    <%each category as value%>
    <div class="category_item special"  
         data-pcate="<%value.parentid%>"   
         data-ccate="<%value.id%>"  
         data-level='<%value.level%>'>
        <img src="<%value.thumb%>" />
        <div class="name"><%value.name%></div>
    </div>
    <%/each%>
</script>

<script id='tpl_third_list' type='text/html'>
  <%each recommend_products as value%>
  <a href="<?php  echo $this->createMobileUrl('shop/detail')?>&id=<%value.id%>">
    <div class="category_item" >
        
        <img src="<%value.thumb%>" />
        <div class="name"><%value.title%></div>
    </div>
    </a>
    <%/each%>
</script>
 

<script id='tpl_product_list' type='text/html'>
  <%each products as value%>
  <a href="<?php  echo $this->createMobileUrl('shop/detail')?>&id=<%value.id%>">
    <div class="category_item" >
       <%if value.status==2%><div class="onlyshow">敬请期待</div><%/if%>
        <img src="<%value.thumb%>" />
        <div class="name"><%value.title%></div>
    </div>
    </a>
    <%/each%>
</script>

<script language='javascript'>
    var category = [];
    var children = [];
    var recommand = [];
    var recommend_products=[];
    var products=[];
    var second_categoris=[];
    var pcate = 'rec';
    require(['tpl', 'core'], function (tpl, core) {
     
     function bindChildEvents(){
          $('.category_item').unbind('click').click(function(){
          	if($(this).children('.onlyshow').length>0){
          		return false;
          	}
              if($(this).data('cate')=='back'){
                 if(pcate!='rec'){ 
                    setCategory(pcate);
                }else{
                    setCategory('rec');
                }
                  return;
             }
                        var level = $(this).data('level');
                        var show = <?php  echo intval($shopset['catshow'])?>;
                        <?php  if(intval($shopset['catlevel'])==3) { ?>
                              var ccate = $(this).data('ccate');
                              var tcate = $(this).data('tcate');
                              if(show==0){
                                    location.href = core.getUrl('shop/list',{ccate:ccate,tcate:tcate});     
                              }
                              else{
                                    if(level==2){
                                    
                                         setCategory(ccate,2);
                                    }
                                    else {
                                      
                                        location.href = core.getUrl('shop/list',{ccate:ccate,tcate:tcate});     
                                   }
                              }
                        <?php  } else { ?>
                                var pcate = $(this).data('pcate');
                                var ccate = $(this).data('ccate');
                                location.href = core.getUrl('shop/list',{pcate:pcate,ccate:ccate});
                        <?php  } ?>
                            
          })
     }
        function setCategory(catid,level){
 
            var ret = null;
            if(catid=='rec'){
                
                recommand = [];
                for(i in category){
              
                    if(category[i].isrecommand=='1'){
                        recommand.push(category[i]);
                    }
                    if(category[i].children.length>0){
                           for(j in category[i].children){
                                if(category[i].children[j].isrecommand==1){
                                        recommand.push(category[i].children[j]);
                                            for(k in category[i].children[j].children){
                                                    if(category[i].children[j].children[k].isrecommand==1){
                                                             recommand.push(category[i].children[j].children[k]);
                                                    }                
                                            }
                                 }
                           }
                    }
                }
                ret = recommand;
                  setCategoryList(ret,level,catid);
            } else if(catid=='rec_products') {
               /*if(level==2){
                for(i in category){
                     for(j in category[i].children){ //二级
                            if( category[i].children[j].id == catid){
                                        ret = category[i].children[j].children;
                                        setCategoryList(ret,level,catid);
                                        return;
                            }
                     }
                }
               }else{
                    for(i in category){

                        if( category[i].id==catid){
                              ret =  category[i].children;
                              break;
                        }
                    } 
               }*/
              goods = [];
               for(i in recommend_products){
                     //for(j in recommend_products[i].children){ //二级
                            //if( recommend_products[i].children[j].id == catid){
                      		  goods.push(recommend_products[i]);
                            //setCategoryList(ret,level,catid);
                           // }
                     //}
                }
               ret=goods;
              setCategoryList(ret,level,catid);
           }else{
           		goods=[];
           		for(i in second_categoris){
                     //for(j in recommend_products[i].children){ //二级
                            //if( recommend_products[i].children[j].id == catid){
                            if(catid== second_categoris[i].id){
                            	for(j in second_categoris[i].goods){
                      					goods.push(second_categoris[i].goods[j]);
                      			}
                            }
                }
           		ret=goods;
           		setCategoryList(ret,level,catid);
           }
        }
        function setCategoryList(ret,level,catid){
               showAdv(catid);
               if(catid=='rec'){
               	$('#right_container  .inner').html(tpl('tpl_child_list',{category:ret,level:level,catid:catid}));
               }else if(catid=='rec_products'){
               	$('#right_container  .inner').html(tpl('tpl_third_list',{recommend_products:ret,level:level,catid:catid}));
               }else{
               	$('#right_container  .inner').html(tpl('tpl_product_list',{products:ret,level:level,catid:catid}));
               }
               
			var img_height=0;
            setTimeout(function(){
              $('#right_container  .inner img').each(function(){
              	 if(img_height==0){ img_height=$(this).closest('.category_item').width()}
                  $(this).height(img_height);
              })
              },10);
             bindChildEvents();           
        }
        function showAdv(cate){
                        
            var adv = $('#right_container .adv');
            var img = '',url ='';
            if(cate=='rec'){
                img = "<?php  echo $shopset['catadvimg']?>",url = "<?php  echo $shopset['catadviurl']?>";
            }
            else{
        
            for(i in category){
                  if(category[i].id==cate) {
                      img = category[i].advimg,url = category[i].advurl;
                      break;
                  }
                  for(j in category[i].children){ //二级
                         if(category[i].children[j].id==cate) {
                            img = category[i].children[j].advimg,url = category[i].children[j].advurl;
                            break;
                        }
                   }
             }
         }
             if(img!=''){
                          adv.find('img').attr('src',img);
                         $('#right_container .adv').show();
                         if(url!=''){
                             adv.unbind('click').click(function(){
                                 location.href = url;
                            });
                         } 
                     } else{
                         adv.hide().unbind('click');
                     }
        }
        core.json('shop/util',{op:'category'}, function (json) {
                 result = json.result;
                 category = result.category;
                 //TODO
                 recommend_products=result.recommend_products;
                 second_categoris=result.second_categoris;
                 $('#container').append(tpl('tpl_main'));
           
           $('.main').height($(document.body).height()-90);
                 $('#left_container').html(tpl('tpl_parent_list',result));
             
              var bw = $(document.body).width()-90;
             $('#right_container .inner').width( bw);
             $('#right_container .adv').width( bw-8);
                 setCategory('rec');
                 
                 $('.parent_item').click(function(){
                     $('.parent_item').removeClass('on');
                     $(this).addClass('on');
                     pcate = $(this).data('cate');
                     setCategory($(this).data('cate'));
                  })
                  
                 
                 
                    $('.search').click(function(){

                       $(".search1").animate({bottom:"0px"},100);
                       $('#keywords').focus().unbind('keyup').keyup(function(){
                                var keywords = $.trim( $(this).val());
                                if(keywords==''){
                                    $('#search_container').html("");         
                                    return;
                                }
                                core.json('shop/util',{op:'search',keywords:keywords }, function (json) {
                                     var result = json.result;
                                     if(result.list.length>0){
                                        $('#search_container').html(tpl('tpl_search_list',result));    
                                     }
                                     else{
                                        $('#search_container').html("");         
                                     }

                                  }, true);
                        });
                        $('.search1 .home1').unbind('click').click(function(){
                             $(".search1").animate({bottom:"-100%"},100);
                        });
                    });
        
        }, true);
 
        $('.sort').click(function () {
                var display = $(".sort_list").css('display');
                if (display == 'none') {
                    $(".sort_list").fadeIn(200);
                } else {
                    $(".sort_list").fadeOut(100);
                }

        });
     
    });
</script>
<?php  $show_footer=true;$footer_current ='second'?> 
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
