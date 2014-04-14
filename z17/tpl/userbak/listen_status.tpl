<!--{if $a == 'getlisten'}-->
  <!--关注状态-->
  <!--{if $flag == '1'}-->
    <a href="###" class="pcbtn-coff" onclick="obj_action_listen('<!--{$uid}-->', 'cancel', '<!--{$tipsid}-->');">取消关注</a>
  <!--{else}-->
    <a href="###" class="pcbtn-green" onclick="obj_action_listen('<!--{$uid}-->', 'listen', '<!--{$tipsid}-->');">+加关注</a>
  <!--{/if}-->
<!--{/if}-->

<!--{if $a == 'listen'}-->
  <!--加关注-->
  <!--{if empty($error)}-->
	<!--{if $flag == '1'}-->
	<a href="###" class="pcbtn-coff" onclick="obj_action_listen('<!--{$uid}-->', 'cancel', '<!--{$tipsid}-->');">取消关注</a>
	<!--{/if}-->
  <!--{else}-->
	<script>alert('<!--{$error}-->');</script>
  <!--{/if}-->
<!--{/if}-->

<!--{if $a == 'cancel'}-->
  <!--取消关注-->
  <!--{if empty($error)}-->
	<!--{if $flag == '1'}-->
	<a href="###" class="pcbtn-green" onclick="obj_action_listen('<!--{$uid}-->', 'listen', '<!--{$tipsid}-->');">+加关注</a>
	<!--{/if}-->
  <!--{else}-->
	<script>alert('<!--{$error}-->');</script>
  <!--{/if}-->
<!--{/if}-->

<!--{if $a == 'black'}-->
  <!--拉黑名单-->
  <!--{if empty($error)}-->
	<!--{if $flag == '1'}-->
	<a href="###" class="pcbtn-green" onclick="obj_action_listen('<!--{$uid}-->', 'listen', '<!--{$tipsid}-->');">+加关注</a>
	<!--{/if}-->
  <!--{else}-->
	<script>alert('<!--{$error}-->');</script>
  <!--{/if}-->
<!--{/if}-->