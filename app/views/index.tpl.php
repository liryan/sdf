<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/index.css" />
</head>
<body>
<h1>Units List</h1>
<script type="text/javascript">
function showId(id)
{
	if($("#con_"+id).css("display")=="none"){
		$("#con_"+id).css("display","block");
	}
	else{
		$("#con_"+id).css("display","none");
	}
}

function playIt(voice)
{
	var audio = document.createElement("audio");
	audio.src=voice
	audio.play();
}

</script>
<div>
	<div>
	{foreach $data['page'] as $item}
		<a href="/?unit={$item->unit}" class="bt-small fl {if $data['cur_unit']==$item->unit}bt-red{else}bt-yellow{/if}">{$item->unit}</a>
	{/foreach}
	</div>
	<div style="clear:both"></div>
</div>
<div>
	{foreach $data['data'] as $k=>$item}
    	<div><hr style="height:1px;border:none;border-top:1px dashed #0066CC;" /><span class="big_no">{$k}</span></div>
		{foreach $item as $it}
	    <div><span class="no">{$it->answer}</span><a href="javascript:showId({$it->id})" class="word">{$it->word}</a><a href="javascript:playIt('{$it->voice}')"><img class="speaker" src="/image/speaker.png"></a></div>
	    <div></div>
	    <div><p class="content" id="con_{$it->id}">{$it->means}</p></div>
		{/foreach}
	{/foreach}
</div>
<br/>
<div>
<a class="bt-small bt-green fl" href="/?unit={$data['next_unit']}">Next Unit</a>
<a class="bt-small bt-green fl" href="/add?unit={$data['cur_unit']}">[ + ]</a>
</div>
</body>
</html>
