<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 15/9/12
 * Time: 下午5:29
 */
/**
 * 友情链接
 */
function friendLink()
{
    register_widget('WP_Widget_FriendLink');
}
add_action('widgets_init','friendLink');

/**
 * 自定义Walker用于实现跳转
 * Class Custom_Walker_Nav_Menu
 */
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item->target = '_blank';
        parent::start_el($output, $item, $depth, $args, $id); // TODO: Change the autogenerated stub
    }

}

class WP_Widget_FriendLink extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array('classname'=>'widget_friend_link','description'=>'博客友情链接小工具');
        parent::__construct(false,'友情链接',$widget_ops);
    }

    function form($instance)
    {
        $menus = wp_get_nav_menus();
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
        ?>
        <!--表格布局的输出表单-->
        <table>
        <tr><td>标题:</td><td>
                <input id="<?php echo $this->get_field_id('title') ?>"
                       name="<?php echo $this->get_field_name('title') ?>" type="text"
                       value="<?php echo $instance['title'] ?>" />
        <tr><td>选择菜单:</td><td>
        <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
            <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
            <?php foreach ( $menus as $menu ) : ?>
                <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
                    <?php echo esc_html( $menu->name ); ?>
                </option>
            <?php endforeach; ?>
        </select>
        </td></tr></table>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = array();
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
        }
        if ( ! empty( $new_instance['nav_menu'] ) ) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }
        return $instance;
    }

    function widget($args, $instance)
    {
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
        if ( !$nav_menu ){
            return;
        }
        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '友情链接' : $instance['title'], $instance, $this->id_base );
        $nav_menu_args = array(
            'fallback_cb' => 'wp_page_menu',
            'menu'        => $nav_menu,
            'container' => 'div',
            'container_class' => 'widget widget_categories',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<h2 class="widget-title">'.$instance['title'].'</h2><ul>%3$s</ul>',
            'walker' => new Custom_Walker_Nav_Menu(),
        );
        wp_nav_menu(apply_filters('widget_nav_menu_args', $nav_menu_args, $nav_menu, $args ) );
    }
}

?>