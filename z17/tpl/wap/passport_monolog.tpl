<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="slide_bg_d"> 为了让真正懂你的追求者找到你，请写一段内心独白介绍自己的性格、背景、特点、喜好和对另一半的期望。</div>
<div class="index_p">
  <form method="post" action="<!--{$wapfile}-->?c=passport">
    <input type="hidden" name='a' id='a' value='savemonolog' />
    <textarea name="content" id="content" rows="8" cols="25" ></textarea>
    <br/>
    20-1500字<br/>
    <input class="submit_b" type="submit" value="保存内心独白" />
  </form>
</div>
<a href="<!--{$wapfile}-->?c=passport&a=avatar">跳过此步以后再说</a>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
