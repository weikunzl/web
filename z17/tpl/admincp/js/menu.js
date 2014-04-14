$(document).ready(function(){
	$(".switchable-panel").find("a").bind("click",function(){
		$(".switchable-panel").find("a").removeClass("current");
		parent.main.location.href = $(this).attr("href");
		$(this).addClass("current");
		return false;
	});
	
	$(".switchable-panel").find("a").first().click();
});