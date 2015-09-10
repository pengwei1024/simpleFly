<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 15/9/8
 * Time: 下午3:50
 */
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
