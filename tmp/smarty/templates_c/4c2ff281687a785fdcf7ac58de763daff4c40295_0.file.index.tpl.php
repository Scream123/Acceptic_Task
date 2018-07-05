<?php
/* Smarty version 3.1.32, created on 2018-05-27 13:21:33
  from 'D:\OpenServer2\domains\accepticnew.loc\views\default\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0a86ad75ad04_54900183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c2ff281687a785fdcf7ac58de763daff4c40295' => 
    array (
      0 => 'D:\\OpenServer2\\domains\\accepticnew.loc\\views\\default\\index\\index.tpl',
      1 => 1527405157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0a86ad75ad04_54900183 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Веб-приложение для регистрации и аутентификации пользователей</title>

    <!-- Bootstrap -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>


<div class="container-fluid">
    <div class="row" id="main_container">
        <div class="col-xs-6 col-md-6">
            Зарегистрироваться
            <br/><br/>
            <!--Форма регистрации -->
            <div id="registerBox">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="r_email" placeholder="Email" id="r_email" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Имя</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="r_name" placeholder="Name" id="r_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Фамилия</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="r_surname" placeholder="Surname" id="r_surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Телефон</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="r_phone" id="r_phone" placeholder="Phone" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Адрес</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="r_adress" placeholder="Adress" id="r_adress" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Пароль</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="r_pass" placeholder="Password" id="r_pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Повторите пароль</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="r_pass2" placeholder="Repeat password" id="r_pass2">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10 ">
                            <button type="button" class="btn btn-info " onclick="registerNewUser();">Зарегистрироваться</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- </Форма регистрации> -->
        </div>
        <div class="col-xs-6 col-md-6">
            Войти
            <br/>
            <br/>
            <!-- -->

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="pwd" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-info align_center" onclick="login();">Войти</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html><?php }
}
