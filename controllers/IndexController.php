<?php

/**
 * Главная страница
 */

class IndexController
{
    public function actionIndex()
    {
     $smarty = new Smarty();

        $smarty->assign('pageTitle', 'Главная страница сайта');

        $smarty->display(ROOT.'/views/default/header.tpl');
        $smarty->display(ROOT.'/views/default/index.tpl');
        $smarty->display(ROOT.'/views/default/footer.tpl');


    }

}