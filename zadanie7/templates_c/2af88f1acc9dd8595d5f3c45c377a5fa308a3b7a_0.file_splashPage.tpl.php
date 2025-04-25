<?php
/* Smarty version 5.4.2, created on 2025-04-04 18:00:38
  from 'file:splashPage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67f00226dd3f52_68505284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2af88f1acc9dd8595d5f3c45c377a5fa308a3b7a' => 
    array (
      0 => 'splashPage.tpl',
      1 => 1743773244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67f00226dd3f52_68505284 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie5b\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_23792952867f00226dc9080_11175532', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'form'} */
class Block_164067163167f00226dd13f9_04201030 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie5b\\app\\views\\templates';
}
}
/* {/block 'form'} */
/* {block "content"} */
class Block_23792952867f00226dc9080_11175532 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie5b\\app\\views\\templates';
?>

<header id="head">
    <div class="container">
        <div class="row"></br></br>
            <h1 class="lead">NAJLEPSZY KALKULATOR KREDYTOWY</h1></br>
            <?php if (!$_smarty_tpl->getValue('isLogged')) {?>
                <h5>Dostępny tylko dla zalogowanych użytkowników</h5></br></br>
                <p><button class="btn btn-default btn-lg soft-scroll-link" role="button" href="#calc">Zobacz demo</button></p>
                <h5>Lub <a href="controller.php?action=loginPage" >zaloguj się</a>, aby skorzystać z aplikacji</h5>
            <?php } else { ?>
                <p><button class="btn btn-default btn-lg soft-scroll-link top-margin" role="button" href="#calc">Przejdź do aplikacji</button></p>
            <?php }?>
        </div>
    </div>
</header>
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_164067163167f00226dd13f9_04201030', 'form', $this->tplIndex);
?>

<?php
}
}
/* {/block "content"} */
}
