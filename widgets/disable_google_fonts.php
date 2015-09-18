<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 15/9/18
 * Time: 上午11:32
 */

//禁用Googlefont
class Disable_Google_Fonts {
    public function __construct() {
        add_filter( 'gettext_with_context', array( $this, 'disable_open_sans'             ), 888, 4 );
    }
    public function disable_open_sans( $translations, $text, $context, $domain ) {
        if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
            $translations = 'off';
        }
        return $translations;
    }
}
$disable_google_fonts = new Disable_Google_Fonts;
?>