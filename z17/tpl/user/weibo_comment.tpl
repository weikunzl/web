<!--for ajax-->
<!--{if !empty($comment)}-->
				  <!--{foreach $comment as $val}-->
			      <li>
				    <div class="who-img"><img src="<!--{$val.avatarurl}-->" width="30" height="37" /></div>
					<div class="who-comm">
					<!--{$val.username}-->：
					<!--{$val.cmcontent|nl2br}-->
					<br />
					<span style="float:right;color:#999999;"><!--{$val.cmtime|date_format:"%Y-%m-%d %H:%M"}-->&nbsp;&nbsp;&nbsp;<a href="###" onclick="addon_reply('<!--{$val.wbid}-->', '<!--{$val.username}-->');">回复</a></span>
					</div>
				  </li>
				  <!--{/foreach}-->
<!--{/if}-->