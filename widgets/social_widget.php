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
                margin-top: -2rem;
            }
            .social > a {
                display: inline-block;
                width: 34px;
                height: 34px;
                border-radius: 34px;
                margin: 0 10px;
                opacity: 0.7;
                outline: none;
            }

            .social > a:hover{
                opacity: 1;
            }

            .social > .github {
                background: url("<?php bloginfo('template_directory'); ?>/images/github.png") center #000000 no-repeat;
            }
            .social > .github:hover{
                border: 1px solid #909ab6;
            }

            .social > .weibo {
                background: url("<?php bloginfo('template_directory'); ?>/images/weibo.png") center #fa7d3c no-repeat;
            }
            .social > .weibo:hover{
                border: 1px solid #da7d3c;
            }

            .social > .rss {
                background: url("<?php bloginfo('template_directory'); ?>/images/rss.png") center #cf5d0f no-repeat;
            }
            .social > .rss:hover{
                border: 1px solid #ff5d0f;
            }

            .social > .email {
                background: url("<?php bloginfo('template_directory'); ?>/images/mail.png") center #0078d8 no-repeat;
            }
            .social > .email:hover{
                border: 1px solid #0078d8;
            }
        </style>
        <!--社交平台-->
        <div class="social">
            <a class="github" rel="nofollow" target="_blank" href="https://github.com/pengwei1024" title="github"></a>
            <a class="weibo" rel="nofollow" target="_blank" href="http://weibo.com/2631836861" title="weibo"></a>
            <a class="rss" rel="nofollow" target="_blank" href="/feed/" title="rss"></a>
            <a class="email" rel="nofollow" target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=pengwei1024@gmail.com"
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

    public function __construct()
    {
        $widget_ops = array('classname'=>'widget_social','description'=>'社交分享');
        parent::__construct(false,'社交分享',$widget_ops);
    }

}
?>