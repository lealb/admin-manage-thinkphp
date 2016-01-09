<?php
/*
 * 后台公共函数
 * @Date:2016-01-09 20:41
 * @Auther:lijiadongyue@gmail
 */

/**
 * @param $mList
 * @param int $pid
 * @return array
 * description:菜单递归方法
 */
function getMenu($mList, $pid = 0)
{
    $arr = array();
    foreach ($mList as $array) {
        if ($array['pid'] == $pid) {
            $array['child'] = getMenu($mList, $array['id']);
            $arr[$array['id']] = $array;
        }
    }
    return $arr;
}


?>