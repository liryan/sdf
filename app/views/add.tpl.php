<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/index.css" />
</head>
<body>
<h1>Add Word</h1>
<script type="text/javascript">
</script>
<div>
</div>
<div>
<form method="post" action="/add">
<input type="hidden" name="unit" value="{$data['unit']}">
<div>
<label>question id</label>
<input type="text" value="" name="question" id="question" placeholder="题的序号">
</div>
<div>
<label>answer id</label>
<input type="text" name="answer" value="" id="answer" placeholder="第几个答案">
</div>
<div>
<label>word</label>
<input type="text" value="" id="word" name="word" placeholder="单词" ><a href="javascript:fetchIt()">获取释义</a>
</div>
<div>
<label>speaker</label>
<input type="text" name="voice" value="" id="voice">
</div>
<div>
<label>explian</label><textarea style="height:18rem;width:100%;margin:0.5rem" name="means" id="means">
</textarea>
</div>
<div>
<input type="submit" name="action_add" value="  添加  ">
</div>
</form>
</body>
<script type="text/javascript">
function fetchIt()
{
	word=$("#word").val();
	$.get('/fetch?word='+word,function(data){
		obj=JSON.parse(data);
		if(obj.symbols.length>0){
			mp3=obj.symbols[0].ph_en_mp3;
			if(!mp3){
				mp3=obj.symbols[0].ph_am_mp3;
			}
			if(!mp3){
				mp3=obj.symbols[0].ph_tts_mp3;
			}
			$("#voice").val(mp3);
			$("#means").val("["+obj.symbols[0].ph_en+"]");
		}
	});
}
$(function(){
	$.get("/try?unit={$data['unit']}",function(data){
		obj=JSON.parse(data);
		$("#question").val(obj.maxqid);
		$("#answer").val(obj.answer);
	});
});
</script>
</html>
