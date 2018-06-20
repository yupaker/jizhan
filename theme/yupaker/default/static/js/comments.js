// JavaScript Document
function retextarea(catreid,reid,nickname,newsid){
	//alert(reid);
	$(".retextarea").html("");
	$(".retextarea").hide();
	var html = "<form action='/comments/save.html' method='post' >"+
			   "<span>回复 <blue>"+nickname+"</blue>：</span>"+
			   "<textarea name='content'></textarea>"+
			   "<input type='hidden' name='reid' value='"+reid+"'>"+
			   "<input type='hidden' name='catreid' value='"+catreid+"'>"+
			   "<input type='hidden' name='newsid' value='"+newsid+"'>"+
               "<input class='sub' type='submit' value='发表'></form>";
	
	
	$("#retextarea" + reid).html(html);
	$("#retextarea" + reid).show();
	
	
}