<?php
/* Smarty version 5.4.2, created on 2025-03-27 14:41:13
  from 'file:loginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e555791b9bf8_41385235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1a559f3fbdbf7ebbbabf8044b98f5f499ecd021' => 
    array (
      0 => 'loginView.tpl',
      1 => 1743082845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e555791b9bf8_41385235 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie4\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_168601248367e555791a05c3_02194653', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_168601248367e555791a05c3_02194653 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie4\\templates';
?>

    <header id="head" class="secondary"></header>

    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Strona główna</a></li>
            <li class="active">Logowanie</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Zaloguj się</h1></br>
                </header>

                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Zaloguj się do swojego konta</h3>
                            <p class="text-center text-muted">Zalogowani użtkownicy mogą korzystać z funkcjonalnośći aplikacji</p>
                            <hr>

                            <form method="post" action="app/controller.php?action=login">
                                <div class="top-margin">
                                    <label>Login <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="login">
                                </div>
                                <div class="top-margin">
                                    <label>Hasło <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="pass">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-8">

                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" type="submit">Zaloguj się</button>
                                    </div>
                                </div>
                            </form>
                            <?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
                                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
                                    <ol class="alert alert-danger p-3 rounded list-unstyled top-margin">
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                                            <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </ol>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>

                </div>

            </article>
            <!-- /Article -->

        </div>
    </div>	<!-- /container -->

<?php
}
}
/* {/block 'content'} */
}
