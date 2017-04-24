<?php
/* Smarty version 3.1.31, created on 2017-04-23 04:00:11
  from "/var/www/html/app/views/index.tpl.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58fbb64b92c2a7_89089853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af8d11aeb257719d2065c08b1f2ed24cc074d246' => 
    array (
      0 => '/var/www/html/app/views/index.tpl.php',
      1 => 1492891209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbb64b92c2a7_89089853 (Smarty_Internal_Template $_smarty_tpl) {
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
<h1>Units List</h1>
<?php echo '<script'; ?>
 type="text/javascript">
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

<?php echo '</script'; ?>
>
<div>
	<div>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['page'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
		<a href="/?unit=<?php echo $_smarty_tpl->tpl_vars['item']->value->unit;?>
" class="bt-small fl <?php if ($_smarty_tpl->tpl_vars['data']->value['cur_unit'] == $_smarty_tpl->tpl_vars['item']->value->unit) {?>bt-red<?php } else { ?>bt-yellow<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item']->value->unit;?>
</a>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</div>
	<div style="clear:both"></div>
</div>
<div>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['data'], 'item', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
    	<div><hr style="height:1px;border:none;border-top:1px dashed #0066CC;" /><span class="big_no"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</span></div>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value, 'it');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
?>
	    <div><span class="no"><?php echo $_smarty_tpl->tpl_vars['it']->value->answer;?>
</span><a href="javascript:showId(<?php echo $_smarty_tpl->tpl_vars['it']->value->id;?>
)" class="word"><?php echo $_smarty_tpl->tpl_vars['it']->value->word;?>
</a><a href="javascript:playIt('<?php echo $_smarty_tpl->tpl_vars['it']->value->voice;?>
')"><img class="speaker" src="/image/speaker.png"></a></div>
	    <div></div>
	    <div><p class="content" id="con_<?php echo $_smarty_tpl->tpl_vars['it']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['it']->value->means;?>
</p></div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</div>
<br/>
<div>
<a class="bt-small bt-green fl" href="/?unit=<?php echo $_smarty_tpl->tpl_vars['data']->value['next_unit'];?>
">Next Unit</a>
<a class="bt-small bt-green fl" href="/add?unit=<?php echo $_smarty_tpl->tpl_vars['data']->value['cur_unit'];?>
">[ + ]</a>
</div>
</body>
</html>
<?php }
}
