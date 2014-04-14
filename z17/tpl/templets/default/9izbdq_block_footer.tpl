<div id="footer">
  <div class="copyright">
    <p class="links">
	<!--{assign var='abouttip' value=vo_list("mod={about} where={v.navshow='1'} num={6}")}-->
	<!--{foreach $abouttip as $volist}-->
	<a href="<!--{$volist.url}-->"><!--{$volist.title}--></a> - 
	<!--{/foreach}-->
	<a href="<!--{$urlpath}-->index.php">返回首页</a>
	</p>
    <p class="cr">
	<!--{$config.sitefooter}-->
	<!--{if !empty($config.icpcode)}-->
	&nbsp;&nbsp;<!--{$config.icpcode}-->
	<!--{/if}-->
	<!--{if !empty($config.tjcode)}-->
	&nbsp;&nbsp;<!--{$config.tjcode|stripslashes}-->
	<!--{/if}-->

	<!--{$copyright_poweredby}-->
	</p>
	<!--{assign var='pluginevent' value=XHook::doAction('plugin_runtime')}-->
	<!--{assign var='pluginevent' value=XHook::doAction('event_online')}-->
  </div>
</div>
<!--{if $login.status == '1'}-->
<!--{include file="<!--{$uctplpath}-->block_popwin.tpl"}-->
<!--{/if}-->
<script type='text/javascript'>
//WAP提醒
$(function(){
    var x = 10;  
    var y = 20;
    $("a.waptips").mouseover(function(e){
           this.myTitle = this.title;
        this.title = "";    
        var tooltip = "<div id='waptips'>"+ this.myTitle +"<\/div>"; //创建 div 元素
        $("body").append(tooltip);    //把它追加到文档中
        $("#waptips")
            .css({
                "top": (e.pageY+y) + "px",
                "left": (e.pageX+x)  + "px"
            }).show("fast");      //设置x坐标和y坐标，并且显示
    }).mouseout(function(){        
        this.title = this.myTitle;
        $("#waptips").remove();   //移除 
    }).mousemove(function(e){
        $("#waptips")
            .css({
                "top": (e.pageY+y) + "px",
                "left": (e.pageX+x)  + "px"
            });
    });
})
</script>