<?php
/* Smarty version 5.4.2, created on 2025-03-27 14:58:35
  from 'file:splashPage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e5598b4bcd00_14383439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38b9f4ba1766994b304a4bd4e7234c038f0d8fbe' => 
    array (
      0 => 'splashPage.tpl',
      1 => 1743083912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e5598b4bcd00_14383439 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie4\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_99806243367e5598b4b1fb5_20975962', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'form'} */
class Block_165532876767e5598b4b7f49_86141281 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie4\\templates';
}
}
/* {/block 'form'} */
/* {block "content"} */
class Block_99806243367e5598b4b1fb5_20975962 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\zadanie4\\templates';
?>

<header id="head">
    <div class="container">
        <div class="row"></br></br>
            <h1 class="lead">NAJLEPSZY KALKULATOR KREDYTOWY</h1></br>
            <?php if (!$_smarty_tpl->getValue('isLogged')) {?>
                <h5>Dostępny tylko dla zalogowanych użytkowników</h5></br></br>
                <p><button class="btn btn-default btn-lg soft-scroll-link" role="button" href="#calc">Zobacz demo</button></p>
                <h5>Lub <a href="app/controller.php?action=loginPage" >zaloguj się</a>, aby skorzystać z aplikacji</h5>
            <?php } else { ?>
                <p><button class="btn btn-default btn-lg soft-scroll-link top-margin" role="button" href="#calc">Przejdź do aplikacji</button></p>
            <?php }?>
        </div>
    </div>
</header>
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_165532876767e5598b4b7f49_86141281', 'form', $this->tplIndex);
?>

<?php
}
}
/* {/block "content"} */
}
