<?php
/* Smarty version 3.1.31, created on 2017-04-23 14:44:20
  from "/data/web/sdf.ryanli.net/app/views/add.tpl.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58fc4d445c9465_26821462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2785509bdd1a999f4f5cf4084ac0cfd3354b0f1' => 
    array (
      0 => '/data/web/sdf.ryanli.net/app/views/add.tpl.php',
      1 => 1492889329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fc4d445c9465_26821462 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="/css/index.css" />
</head>
<body>
<h1>Add Word</h1>
<?php echo '<script'; ?>
 type="text/javascript">
<?php echo '</script'; ?>
>
<div>
</div>
<div>
<form method="post" action="/add">
<input type="hidden" name="unit" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['unit'];?>
">
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
<?php echo '<script'; ?>
 type="text/javascript">
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
	$.get("/try?unit=<?php echo $_smarty_tpl->tpl_vars['data']->value['unit'];?>
",function(data){
		obj=JSON.parse(data);
		$("#question").val(obj.maxqid);
		$("#answer").val(obj.answer);
	});
});
<?php echo '</script'; ?>
>
</html>
<?php }
}
