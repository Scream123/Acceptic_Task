<?php
/**
 * Основные функции
 */


/**
 * Загрузка шаблона
 *
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблонизатора
 */
function loadTemplate($smarty, $templateName) {
    $smarty->display($templateName .TemplatePostFix);
}

/**
 * Преобразование результата работы функции выборки в ассоциативный массив
 *
 * @param  recordset $rs набор строк - результат работы $SELECT
 * @return array
 */
function createSmartyRsArray($rs) {
    $db = Db::getConnection();

    if (!$rs) return false;
    $smartyRs = array();
    $sth = $db->prepare($rs);
    $sth->execute();
    while($row = $sth->fetch(PDO::FETCH_ASSOC))

        $smartyRs[] = $row;

    return $smartyRs;
}


//>фильтрация полученных данных
//function clearStr($data) {
//    $db = Db::getConnection();
//    $data = trim(strip_tags(stripslashes(htmlspecialchars($db->quote($data)))));
//
//   // return $this->_db->quote($data);
//    return $data;
//}
function clearData($data) {
    $data = trim(strip_tags(stripslashes(htmlspecialchars($data))));
    
    return $data;
}

function clearInt($data) {
    return  trim(strip_tags(stripslashes(htmlspecialchars($data))));

}
//<