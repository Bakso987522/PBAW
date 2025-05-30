<?php
/* Smarty version 5.4.2, created on 2025-04-25 14:42:04
  from 'file:resultsView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680b831cd288a1_87080280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b19c19c576386e6b239b5183a4007a3cacf704ec' => 
    array (
      0 => 'resultsView.tpl',
      1 => 1745584917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680b831cd288a1_87080280 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie7\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_541883599680b831cd0e938_79790991', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_541883599680b831cd0e938_79790991 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie7\\app\\views';
?>

    <header id="head" class="secondary"></header>

    <!-- container -->
    <div class="container min-vh-100" style="min-height: 70vh">
<h1 class="ma">Wyniki kalkulatora</h1>
        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Historia wyników kalkulatora</h2>

                                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('results')) > 0) {?>

                                    <table class="table-hover table table-striped table-bordered">
                                        <tr>
                                            <th>Użytkownik</th>
                                            <th>Kwota</th>
                                            <th>Oprocentowanie</th>
                                            <th>Lata</th>
                                            <th>Miesięczna rata</th>
                                            <th>Data obliczenia</th>
                                        </tr>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('results'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->getValue('r')['login'];?>
</td>
                                                <td><?php echo $_smarty_tpl->getValue('r')['amount'];?>
</td>
                                                <td><?php echo $_smarty_tpl->getValue('r')['rate'];?>
%</td>
                                                <td><?php echo $_smarty_tpl->getValue('r')['years'];?>
</td>
                                                <td><?php echo $_smarty_tpl->getValue('r')['result'];?>
</td>
                                                <td><?php echo $_smarty_tpl->getValue('r')['date'];?>
</td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </table>
                                <?php } else { ?>
                                    <p>Brak zapisanych wyników.</p>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
                                        <p><?php echo $_smarty_tpl->getValue('msg');?>
</p>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>

        </div>


    </div>	<!-- /container -->

<?php
}
}
/* {/block 'content'} */
}
