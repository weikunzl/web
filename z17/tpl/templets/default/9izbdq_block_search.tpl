    <div class="n_search_top">
      <form method="post" action="<!--{$urlpath}-->index.php?c=user&a=list" id="search_normal">
        <div class="search_in">
          找:
		  <select name='s_sex' id='s_sex'>
		  <option value='0'>=不限=</option>
		  <option value='2'<!--{if $s_sex == 2}--> selected<!--{/if}-->>女会员</option>
		  <option value='1'<!--{if $s_sex == 1}--> selected<!--{/if}-->>男会员</option>
		  </select>
          &nbsp;年龄:
          <!--{hook mod='age' name='s_sage' text='不限' value=$s_sage}-->
          <span>~</span>
          <!--{hook mod='age' name='s_eage' text='不限' value=$s_eage}-->
          &nbsp;地区:
          <!--{area type='dist1' name='s_dist1' value=$s_dist1 ajax='1' cname='s_dist2' cajax='1' dname='s_dist3' text='=请选择='}-->&nbsp;
		  <span id="json_s_dist2">
			<!--{if $s_dist1>0}-->
			<!--{area type='dist2' pvalue=$s_dist1 cname='s_dist2' cvalue=$s_dist2 cajax='1' dname='s_dist3' dvalue=$s_dist3 text='=不限='}-->
			<!--{else}-->
			  <select name="s_dist2" id="s_dist2"><option value="0">=请选择=</option></select>
			<!--{/if}-->
		  </span>&nbsp;
		  <span id="json_s_dist3">
		  <!--{if $s_dist2>0}-->
		  <!--{area type='dist3' cvalue=$s_dist2 dname='s_dist3' dvalue=$s_dist3 text='=不限='}-->
		  <!--{else}-->
		  <select name="s_dist3" id="s_dist3"><option value="0">=请选择=</option></select>
		  <!--{/if}-->
		  </span>&nbsp;
		  婚史:<!--{hook mod='var' item='marrystatus' type='select' name='s_marry' text='=不限=' value=$s_marry}-->&nbsp;
          <input type="checkbox" value="1" name="s_avatar" id="s_avatar"<!--{if $s_avatar==1}--> checked<!--{/if}--> />
          <label for="s_p_img">有头像</label>
          &nbsp;&nbsp;
		  <input type="submit" value="" name="btn_search" id="btn_search" class="n_search_btn" />&nbsp;
		  <input type="button" value="" name="btn_advsearch" id="btn_advsearch" class="n_advsearch_btn" onclick="window.location.href='<!--{$urlpath}-->index.php?c=user&a=advsearch';" />
		  &nbsp;&nbsp;
		  </div>
      </form>
    </div>