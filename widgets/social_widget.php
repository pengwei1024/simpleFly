<?php
/**
 * Created by PhpStorm.
 * User: pengwei08
 * Date: 15/9/8
 * Time: 下午3:50
 */
function Social_Layout()
{
    register_widget('WP_Widget_Social');
}
add_action('widgets_init','Social_Layout');

class WP_Widget_Social extends WP_Widget{
    public function widget($args, $instance)
    {
        ?>
        <style type="text/css">
            .social {
                text-align: center;
                margin-bottom: 25px;
            }
            .social > a {
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 32px;
                margin: 0 10px;
            }

            .social > .github {
                background: url("<?php bloginfo('template_directory'); ?>/images/github.png") center #000000 no-repeat;
            }

            .social > .weibo {
                background: url("<?php bloginfo('template_directory'); ?>/images/weibo.png") center #fa7d3c no-repeat;
            }

            .social > .rss {
                background: url("<?php bloginfo('template_directory'); ?>/images/rss.png") center #cf5d0f no-repeat;
            }

            .social > .email {
                background: url("<?php bloginfo('template_directory'); ?>/images/mail.png") center #0078d8 no-repeat;
            }
        </style>
        <!--社交平台-->
        <div class="social">
            <a class="github" target="_blank" href="https://github.com/pengwei1024" title="github"></a>
            <a class="weibo" target="_blank" href="http://weibo.com/2631836861" title="weibo"></a>
            <a class="rss" target="_blank" href="/feed/" title="rss"></a>
            <a class="email" target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=pengwei1024@gmail.com"
               title="email"></a>
        </div>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return array();
    }

    public function form($instance)
    {
        ?>
        <table>
            <tr><td>github:</td><td>
                    <input id="<?php echo $this->get_field_id('title') ?>"
                           name="<?php echo $this->get_field_name('title') ?>" type="text"
                           value="<?php echo $instance['title'] ?>" /><td/></tr>
            <tr><td>weibo:</td><td>
                    <input id="<?php echo $this->get_field_id('title') ?>"
                           name="<?php echo $this->get_field_name('title') ?>" type="text"
                           value="<?php echo $instance['title'] ?>" /><td/></tr>
            <tr><td>Rss:</td><td>
                    <input id="<?php echo $this->get_field_id('title') ?>"
                           name="<?php echo $this->get_field_name('title') ?>" type="text"
                           value="<?php echo $instance['title'] ?>" /><td/></tr>
            <tr><td>Email:</td><td>
                    <input id="<?php echo $this->get_field_id('title') ?>"
                           name="<?php echo $this->get_field_name('title') ?>" type="text"
                           value="<?php echo $instance['title'] ?>" /><td/></tr>
            </table>
        <?php
    }

    public function __construct($id_base, $name, $widget_options = array(), $control_options = array())
    {
        $widget_ops = array('classname'=>'widget_social','description'=>'社交分享');
        parent::__construct(false,'社交分享',$widget_ops);
    }

}
?>

