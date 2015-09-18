<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 15/9/18
 * Time: 下午6:46
 */
// 默认页脚信息
$default_footer = "Power By WordPress & simpleFly<br/>CopyRight © 2013 - 2015 舞影凌风 All Rights Reserved";

$pageName = "simpleFly设置";
$settingOptions = array(
    array('name' => '设置头像路径', 'id' => "simpleFly_head_url", "type" => "text"),
    array('name' => '网址统计代码', 'id' => "simpleFly_statistics_text"),
    array('name' => '页脚显示文字', 'id' => "simpleFly_footer_text", "default" => $default_footer)
);

/**
 * 获取option参数
 * @param $id
 * @param null $default
 * @return mixed|null|string|void
 */
function getValue($id, $default = null)
{
    $options = get_option($id);
    if (!empty($options)) {
        return get_option($id);
    } else {
        return isset($default) ? $default : "";
    }
}

function theme_option()
{
    global $pageName, $settingOptions;
    if ($_GET['page'] == basename(__FILE__)) {
        if (isset($_REQUEST['saved'])) {
            foreach ($settingOptions as $value) {
                if (isset($_REQUEST[$value['id']])) {
                    update_option($value['id'], stripslashes($_REQUEST[$value['id']]));
                } else {
                    delete_option($value['id']);
                }
            }
        } else if (isset($_REQUEST['reset'])) {
            foreach ($settingOptions as $value) {
                delete_option($value['id']);
                update_option($value['id'], $value['default']);
            }
        }
    }
    add_theme_page($pageName, $pageName, 'edit_themes', basename(__FILE__), 'showOption');
}

function showOption()
{
    global $settingOptions, $pageName;
    if (isset($_REQUEST['saved'])) echo '<div id="message" class="updated fade"><p><strong>'
        . $pageName . '已保存成功。</strong></p></div>';
    else if (isset($_REQUEST['reset'])) echo '<div id="message" class="updated fade"><p><strong>'
        . $pageName . '已重置成功。</strong></p></div>';
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri());
    ?>/css/theme-options.css"/>
    <div id="main-table">
        <h1><?php echo $pageName; ?></h1>
        <hr/>
        <form method="post">
            <table>
                <?php foreach ($settingOptions as $value) { ?>
                    <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td>
                            <?php
                            switch ($value['type']) {
                                case "text":
                                    echo "<input type='text' name='{$value['id']}'
value='" . getValue($value['id'], $value['default']) . "'/>";
                                    break;
                                default:
                                    echo "<textarea name='{$value['id']}'>"
                                        . getValue($value['id'], $value['default']) . "</textarea>";
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="saved" class="button button-primary">保存设置</button>
                        <button type="submit" name="reset" class="button button-primary">重置</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'theme_option');


?>