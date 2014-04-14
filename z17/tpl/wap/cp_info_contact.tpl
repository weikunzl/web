<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<h3 class="slide_bg_d">【修改联系方式】</h3>
<div class="index_p">
  <div>
    <form action="<!--{$wapfile}-->?c=cp_info" method="post">
	<input type="hidden" name="a" value="savecontact" />
    <table cellpadding='3' cellspacing='3' border='0' class='tab'>
	  <tr>
	    <td>查看权限：</td>
		<td>
		<select name="privacy" id="privacy">
		<option value='1'<!--{if $login.info.privacy=='1'}--> selected<!--{/if}-->>任何人可见</option>
		<option value='2'<!--{if $login.info.privacy=='2'}--> selected<!--{/if}-->>登录会员可见</option>
		<option value='3'<!--{if $login.info.privacy=='3'}--> selected<!--{/if}-->>VIP会员可见</option>
		<option value='4'<!--{if $login.info.privacy=='4'}--> selected<!--{/if}-->>保密</option>
		</select>
		</td>
	  </tr>
	  <tr>
	    <td>*手机号：</td>
		<td>
		<input type='hidden' name='mobilerz' id='mobilerz' value='<!--{$login.info.mobilerz}-->' style="width:120px;" />
		<!--{if $login.info.mobilerz==1}-->
		<input type="hidden" name="mobile" id="mobile" value="<!--{$login.info.mobile}-->" /> 
		<!--{$login.info.mobile}--> （已认证不能修改）
		<!--{else}-->
		<input type="text" name="mobile" id="mobile" value="<!--{$login.info.mobile}-->" style="width:120px;" /> 
		<!--{/if}-->
		</td>
	  </tr>
	  <tr>
	    <td>*Q Q 号：</td>
		<td>
		<input type="text" name="qq" id="qq" value="<!--{$login.info.qq}-->" style="width:120px;" /> 
		</td>
	  </tr>
	  <tr>
	    <td>电 话：</td>
		<td>
		<input type="text" name="telephone" id="telephone" value="<!--{$login.info.telephone}-->" style="width:120px;" /> 
		</td>
	  </tr>
	  <tr>
	    <td>MSN：</td>
		<td>
		<input type="text" name="msn" id="msn" value="<!--{$login.info.msn}-->" style="width:120px;" /> 
		</td>
	  </tr>
	  <tr>
	    <td>微 博：</td>
		<td>
		<input type="text" name="homepage" id="homepage" value="<!--{$login.info.homepage}-->" style="width:120px;" /> 
		</td>
	  </tr>
	  <tr>
	    <td>联系地址：</td>
		<td>
		<input type="text" name="address" id="address" value="<!--{$login.info.address}-->" style="width:120px;" /> 
		</td>
	  </tr>
	  <tr>
	    <td>邮政编码：</td>
		<td>
		<input type="text" name="zipcode" id="zipcode" value="<!--{$login.info.zipcode}-->" style="width:120px;" /> 
		</td>
	  </tr>

	</table>
	<br />
    <input class="submit_b" type="submit" value="编辑保存"/>
    </form>
  </div>
</div>
<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info" >用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=contact">联系方式</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>