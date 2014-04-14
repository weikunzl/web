<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='advsearch'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce member">
    
    <div class="left ri">
      <div class="content">
        <div class="search_box" id="searchBox" style="display:block;">
          <h3>高级搜索</h3>
          <div>
              <div class="search_cont">

				<form method="post" action="<!--{$appfile}-->?c=user&a=list" id="search_high_level">
				<input type='hidden' id="s_searchtype" name="s_searchtype" value="adv" />
                <div class="search_cont_l">
                  <label class="t">我 要 找：</label>
                  <input type="radio" name="s_sex" id="s_sex" value='2'>
                  <label class="r" for="sex_1">女会员</label>
                  <input type="radio" name="s_sex" id="s_sex" value='1'>
                  <label class="r" for="sex_2">男会员</label>
                </div>
                <div class="search_cont_l">
                  <label id="age"  class="t">年&nbsp;&nbsp;&nbsp;&nbsp;龄：</label>
				  <!--{hook mod='age' name='s_sage' value='20' text='=不限='}-->
				  <span>&nbsp;~&nbsp;</span>
				  <!--{hook mod='age' name='s_eage' value='30' text='=不限='}--> 岁
                </div>
                <div class="search_cont_l">
                  <label id="workCity"  class="t">所 在 地：</label>
				  <!--{area type='dist1' name='s_dist1' ajax='1' cname='s_dist2' cajax='1' dname='s_dist3' text='=请选择='}-->&nbsp;
				  <span id="json_s_dist2"></span>&nbsp;
				  <span id="json_s_dist3"></span>&nbsp;&nbsp;
                </div>
                <div class="search_cont_l">
                  <label id="height"  class="t">交友类型：</label>
				  <!--{hook mod='lovesort' name='s_lovesort' type='select' text='=不限='}-->
				</div>
                <div class="search_cont_l">
                  <label id="height"  class="t">身&nbsp;&nbsp;&nbsp;&nbsp;高：</label>
				  <!--{hook mod='height' name='s_sheight' value='155' text='=不限='}-->
				  <span>&nbsp;~&nbsp;</span>
				  <!--{hook mod='height' name='s_eheight' value='175' text='=不限='}--> CM
				</div>
                <div class="search_cont_l">
                  <label id="salary"  class="t">月&nbsp;收&nbsp;入：</label>
				  <!--{hook mod='var' item='salary' type='select' name='s_ssalary' text='=不限='}-->
				  <span>&nbsp;~&nbsp;</span>
				  <!--{hook mod='var' item='salary' type='select' name='s_esalary' text='=不限='}-->
                </div>
                <div class="search_cont_l">
                  <label id="education"  class="t">学&nbsp;&nbsp;&nbsp;&nbsp;历：</label>
				  <!--{hook mod='var' item='education' type='select' name='s_sedu' text='=不限='}-->
				  <span>&nbsp;~&nbsp;</span>
				  <!--{hook mod='var' item='education' type='select' name='s_eedu' text='=不限='}-->
                </div>

				<div style="line-height:40px;">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="75px" align="right">婚&nbsp;&nbsp;&nbsp;&nbsp;史：</td>
					  <td style='margin-left:5px;'><!--{hook mod='var' item='marrystatus' name='s_marry' type='checkbox'}--></td>
					</tr>
				  </table>
				  <div class="c"></div>
				</div>


				<div style="line-height:40px;">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="75px" align="right">有无子女：</td>
					  <td style='margin-left:5px;'><!--{hook mod='var' item='childrenstatus' type='checkbox' name='s_havechild'}--></td>
					</tr>
				  </table>
				  <div class="c"></div>
				</div>


                <div class="search_cont_l">
                  <label id="house"  class="t">住&nbsp;&nbsp;&nbsp;&nbsp;房：</label>
                  <!--{hook mod='var' item='housing' type='select' name='s_house' text='=不限='}-->
                </div>
                <div class="search_cont_l">
                  <label  class="t">购&nbsp;&nbsp;&nbsp;&nbsp;车：</label>
                  <!--{hook mod='var' item='caring' type='select' name='s_car' text='=不限='}-->
                </div>

                <div class="search_cont_l">
                  <label  class="t">职&nbsp;&nbsp;&nbsp;&nbsp;业：</label>
                  <!--{hook mod='var' item='jobs' type='select' name='s_jobs' text='=不限='}-->
                </div>

                <div class="search_cont_l">
                  <label  class="t">形&nbsp;像&nbsp;照：</label>
                  <input type="checkbox" value="1" name="s_avatar" id="s_avatar">
                  <label class="padd_r" for="ph_1">有</label>
                </div>
                <div class="search_cont_l">
                  <label class="t">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <button type="submit" id="btn_search"><span>搜 索</span></button>
                </div>
				</form>

				<form method="post" action="<!--{$appfile}-->?c=user&a=list" id="search_high_level">
				<input type='hidden' id="s_searchtype" name="s_searchtype" value="adv" />
                <div class="search_cont_l">
                  <label class="t">会员ID：</label>
				  <input type="text" name="s_uid" id="s_uid" style="height:22px; padding:3px 5px;border:1px solid; border-color:#adadad #e0e0e0 #e0e0e0 #adadad;width:150px;margin-right:10px; background:#fcfcfc;vertical-align:middle;" /> (输入会员ID进行搜索)
                </div>
                <div class="search_cont_l">
                  <label  class="t">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <button type="submit" id="btn_search_uid"><span>搜 索</span></button>
                </div>
				</form>

              </div>
          </div>

        </div>
      </div>
    </div>

    <div class="right yue1">
      <h2>热门日记</h2>
      <ul class="list_blog">
	    <!--{assign var='hotdiary' value=vo_list("mod={diary} orderby={v.hits DESC} num={10}")}-->
		<!--{foreach $hotdiary as $volist}-->
        <li><a target="_blank" href="<!--{$volist.url}-->" title="<!--{$volist.title}-->"><!--{$volist.title|filterhtml:20}--></a> </li>
		<!--{/foreach}-->
      </ul>
      <h2 style="margin-top:10px;">猜你喜欢</h2>
	  <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->user_80x96.tpl"}-->
      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>