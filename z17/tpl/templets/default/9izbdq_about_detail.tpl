<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='about'}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="member">
    <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->
    <div class="ableft">
	  
	  <!--{assign var='aboutcat' value=vo_list("mod={aboutcat}")}-->
	  <!--{foreach $aboutcat as $volist}-->
      <h2 class="ablefth2" id="mycss_<!--{$volist.catid}-->"><a href="javascript:void(0);" onclick="changemenu(<!--{$volist.catid}-->);"><!--{$volist.catname}--></a></h2>
      <div class="aba" id='mylist_<!--{$volist.catid}-->' style="display:block;"> 
	  <!--{assign var='aboutlist' value=vo_list("mod={about} where={v.catid='<!--{$volist.catid}-->'}")}-->
	  <!--{foreach $aboutlist as $val}-->
	  <a href="<!--{$val.url}-->" class="<!--{if $id == $val.abid}-->abnow<!--{/if}-->"><!--{$val.title}--></a>
	  <!--{/foreach}-->
	  </div>
	  <!--{/foreach}-->

    </div>
    <div class="abright">
      <h2><!--{$about.title}--></h2>
      <div class="abcontent"><!--{$about.content}--> </div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script language="javascript">
function changemenu(id){
	if ($('#mycss_'+id).attr('class') == 'ablefth1') {
		$('#mycss_'+id).removeClass('ablefth1');
		$('#mycss_'+id).addClass('ablefth2');
		$('#mylist_'+id).show();
	}
	else {
		$('#mycss_'+id).removeClass('ablefth2');
		$('#mycss_'+id).addClass('ablefth1');
		$('#mylist_'+id).hide();
	}
}
</script>
