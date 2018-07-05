{*<!DOCTYPE html>*}
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{$pageTitle}</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
    <link href="/template/css/responsive.css" rel="stylesheet">

    <script src="/template/js/jquery-1.7.1.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/main.js"></script>
    <![endif]-->

</head><!--/head-->

<body>
<div class="page-wrapper">


    <header id="header"><!--header-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">

                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <menu>
                                <ul class="nav navbar-nav">


                                    {if User::isGuest()}
                                        <li><a href="/register/"><i class="fa fa-plus-square"></i> Регистрация</a></li>
                                        <li><a href="/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                    {else}
                                        <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                        <li><a href="/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                                    {/if}
                                </ul>
                            </menu>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

    </header><!--/header-->

