<?php
/* Smarty version 5.4.2, created on 2025-04-10 16:36:28
  from 'file:creditView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67f7d76c8a7a18_10610624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02860cf09857201f79f776600783c94492563470' => 
    array (
      0 => 'creditView.tpl',
      1 => 1743772137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67f7d76c8a7a18_10610624 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie6\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_182670125667f7d76c87b963_88012424', 'form');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'splashPage.tpl', $_smarty_current_dir);
}
/* {block 'form'} */
class Block_182670125667f7d76c87b963_88012424 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie6\\app\\views';
?>



    <div class="container top-margin bottom-margin">

        <h2 class="text-center top-space">Oblicz ratę kredytu</h2>
        <br>
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-body top-margin">

                    <form id="calc" class="form-horizontal" action="controller.php?action=calcCompute#calc" method="post">
                        <div class="form-group">
                            <label for="id_x" class="col-sm-2 control-label">Kwota pożyczki: </label>
                            <div class="col-sm-10">
                                <input class="form-control" id="id_x" type="text" name="loan" value="<?php echo $_smarty_tpl->getValue('loan');?>
" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_op" class="col-sm-2 control-label">Okres kredytowania: </label>
                            <div class="col-sm-10">
                                <select id ="id_op" name="years" class="form-control col-sm-2">
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('years_drop'), 'year');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('year')->value) {
$foreach0DoElse = false;
?>
                                        <option value="<?php echo $_smarty_tpl->getValue('year')['value'];?>
" <?php if ($_smarty_tpl->getValue('year')['value'] == $_smarty_tpl->getValue('defYear')) {?>selected<?php }?>>
                                            <?php echo $_smarty_tpl->getValue('year')['label'];?>

                                        </option>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="id_y">Oprocentowanie: </label>
                            <div class="col-sm-10">
                                <input class="form-control" id="id_y" type="text" name="rate" value="<?php echo $_smarty_tpl->getValue('rate');?>
" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2 text-right">
                                <button type="submit" class="btn btn-action">Oblicz</button>
                            </div>
                        </div>
                    </form>
                    <?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
                            <ol class="alert alert-danger p-3 rounded list-unstyled top-margin">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
                                    <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </ol>
                        <?php }?>
                    <?php }?>
                    <?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
                        <div class="alert alert-success p-3 rounded">
                            <?php echo $_smarty_tpl->getValue('result');?>

                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'form'} */
}
