<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 15/9/13
 * Time: 下午10:27
 */

/**
 * 解决gravatar头像不显示
 * @param $avatar
 * @return mixed
 */
function get_ssl_avatar($avatar)
{
    return preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/', '<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">', $avatar);
}

add_filter('get_avatar', 'get_ssl_avatar');

?>