<?php
/* Smarty version 5.4.2, created on 2025-04-10 16:36:28
  from 'file:splashPage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67f7d76c8d2054_53413913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7545631980c41ef55d038269349f19b562f2ee4' => 
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
function content_67f7d76c8d2054_53413913 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie6\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_51206982967f7d76c8cba58_72011320', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'form'} */
class Block_66567489967f7d76c8d0636_84150160 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie6\\app\\views\\templates';
}
}
/* {/block 'form'} */
/* {block "content"} */
class Block_51206982967f7d76c8cba58_72011320 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie6\\app\\views\\templates';
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
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_66567489967f7d76c8d0636_84150160', 'form', $this->tplIndex);
?>

<?php
}
}
/* {/block "content"} */
}
