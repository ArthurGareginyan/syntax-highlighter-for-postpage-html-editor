<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Page
 *
 * @since 2.1
 */
function SHighlighterForPPHE_render_submenu_page() {

    // Call messages
    SHighlighterForPPHE_hello_message();
    SHighlighterForPPHE_error_message();

    // Layout of page
    ?>
    <div class="wrap">
        <h2>
            <?php echo SHPPHE_NAME; ?>
            <span>
                <?php printf(
                              __( 'by %s Arthur Gareginyan %s', SHPPHE_TEXT ),
                                  '<a href="http://www.arthurgareginyan.com" target="_blank">',
                                  '</a>'
                             );
                ?>
            </span>
        </h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- TABS NAVIGATION MENU -->
            <ul class="tabs-nav">
                <li class="active"><a href="#tab-core" data-toggle="tab"><?php _e( 'Settings', SHPPHE_TEXT ); ?></a></li>
                <li><a href="#tab-usage" data-toggle="tab"><?php _e( 'Usage', SHPPHE_TEXT ); ?></a></li>
                <li><a href="#tab-faq" data-toggle="tab"><?php _e( 'F.A.Q.', SHPPHE_TEXT ); ?></a></li>
                <li><a href="#tab-author" data-toggle="tab"><?php _e( 'Author', SHPPHE_TEXT ); ?></a></li>
                <li><a href="#tab-support" data-toggle="tab"><?php _e( 'Support', SHPPHE_TEXT ); ?></a></li>
                <li><a href="#tab-family" data-toggle="tab"><?php _e( 'Family', SHPPHE_TEXT ); ?></a></li>
            </ul>
            <!-- END-TABS NAVIGATION MENU -->

            <!-- TAB 1 -->
            <div class="tab-page fade active in" id="tab-core">

                <?php require_once( SHPPHE_PATH . 'inc/php/settings.php' ); ?>

            </div>
            <!-- END-TAB 1 -->

            <!-- TAB 2 -->
            <div class="tab-page fade" id="tab-usage">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Usage', SHPPHE_TEXT ); ?></h3>
                    <div class="inside">
                        <p><?php _e( 'To replace the default Post/Page HTML editor with an enhanced editor that provided by this plugin, simply follow these steps:', SHPPHE_TEXT ); ?></p>
                        <ol class="custom-counter">
                            <li><?php _e( 'Go to the "Settings" tab.', SHPPHE_TEXT ); ?></li>
                            <li><?php _e( 'Select the desired settings and click the "Save Changes" button.', SHPPHE_TEXT ); ?></li>
                            <li><?php _e( 'Enjoy your fancy Post/Page Editor.', SHPPHE_TEXT ); ?> <?php _e( 'It\'s that simple!', SHPPHE_TEXT ); ?></li>
                        </ol>
                        <p class="note"><b><?php _e( 'Note!', SHPPHE_TEXT ); ?></b> <?php _e( 'If you want more options then tell me and I will be happy to add it.', SHPPHE_TEXT ); ?></p>
                    </div>
                </div>
            </div>
            <!-- END-TAB 2 -->

            <!-- TAB 3 -->
            <div class="tab-page fade" id="tab-faq">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Frequently Asked Questions', SHPPHE_TEXT ); ?></h3>
                    <div class="inside">

                        <div class="panel-group" id="collapse-group">
                            <?php
                                $loopvalue = '11';
                                for ( $i = 1; $i <= $loopvalue; $i++ ) {
                                    echo '<div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#collapse-group" href="#element' . $i . '">
                                                    <h4 class="panel-title"></h4>
                                                </a>
                                            </div>
                                            <div id="element' . $i . '" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                </div>
                                            </div>
                                          </div>';
                                }
                            ?>
                        </div>

                        <div class="question-1"><?php _e( 'Will this plugin work on my WordPress.COM website?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-1"><?php _e( 'Sorry, this plugin is available for use only on self-hosted (WordPress.ORG) websites.', SHPPHE_TEXT ); ?></div>

                        <div class="question-2"><?php _e( 'Can I use this plugin on my language?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-2"><?php printf(
                                                            __( 'Yes. But If your language is not available then you can make one. This plugin is ready for translation. The<code>.pot</code>file is included and placed in the <code>languages</code> folder. Many of plugin users would be delighted if you shared your translation with the community. Just send the translation files (<code>*.po, *.mo</code>) to me at the %s and I will include the translation within the next plugin update.', SHPPHE_TEXT ),
                                                                '<a href="mailto:arthurgareginyan@gmail.com?subject=Syntax Highlighter for Post/Page HTML Editor">arthurgareginyan@gmail.com</a>'
                                                          );
                                              ?></div>

                        <div class="question-3"><?php _e( 'How does it work?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-3"><?php _e( 'On the "Settings" tab, select the desired settings and click the "Save Changes" button. Enjoy your fancy Post/Page Editor. It\'s that simple!', SHPPHE_TEXT ); ?></div>

                        <div class="question-4"><?php _e( 'Does this plugin provide a syntax highlighting for the Theme/Plugin Editor?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-4"><?php printf(
                                                            __( 'No, only the Post/Psge Editor supports. For the Theme/Plugin Editor you can use my another plugin that called the %s Syntax Highlighter for Post/Page HTML Editor %s.', SHPPHE_TEXT ),
                                                                '<a href="https://wordpress.org/plugins/syntax-highlighter-for-wp-editor" target="_blank">',
                                                                '</a>'
                                                          );
                                              ?></div>

                        <div class="question-5"><?php _e( 'Does this plugin requires any modification of the theme?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-5"><?php _e( 'Absolutely not. This plugin is configurable entirely from the plugin settings page.', SHPPHE_TEXT ); ?></div>

                        <div class="question-6"><?php _e( 'Does this require any knowledge of HTML or CSS?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-6"><?php _e( 'This plugin can be configured with no knowledge of HTML or CSS, using an easy-to-use plugin settings page. But you need to know the HTML or CSS in order to add/remove/modify the HTML or CSS code by using this plugin.', SHPPHE_TEXT ); ?></div>

                        <div class="question-7 question-red"><?php _e( 'It\'s not working. What could be wrong?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-7"><?php _e( 'As with every plugin, it\'s possible that things don\'t work. The most common reason for this is a web browser\'s cache. Every web browser stores a cache of the websites you visit (pages, images, and etc.) to reduce bandwidth usage and server load. This is called the browser\'s cache.​ Clearing your browser\'s cache may solve the problem.', SHPPHE_TEXT ); ?><br><br>
                                              <?php _e( 'It\'s impossible to tell what could be wrong exactly, but if you post a support request in the plugin\'s support forum on WordPress.org, I\'d be happy to give it a look and try to help out. Please include as much information as possible, including a link to your website where the problem can be seen.', SHPPHE_TEXT ); ?></div>

                        <div class="question-8 question-red"><?php _e( 'The last WordPress update is preventing me from editing my website that is using this plugin. Why is this?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-8"><?php _e( 'This plugin can not cause such problem. More likely, the problem are related to the settings of the website. It could just be a cache, so please try to clear your website\'s cache (may be you using a caching plugin, or some web service such as the CloudFlare) and then the cache of your web browser. Also please try to re-login to the website, this too can help.', SHPPHE_TEXT ); ?></div>

                        <div class="question-9 question-red"><?php _e( 'Where to report bug if found?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-9"><?php printf(
                                                            __( 'Please visit the %s Dedicated Plugin Page on GitHub %s and report.', SHPPHE_TEXT ),
                                                                '<a href="https://github.com/ArthurGareginyan/syntax-highlighter-for-postpage-html-editor" target="_blank">',
                                                                '</a>'
                                                          );
                                              ?></div>

                        <div class="question-10"><?php _e( 'Where to share any ideas or suggestions to make the plugin better?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-10"><?php printf(
                                                            __( 'Any suggestions are very welcome! Please send me an email to %s arthurgareginyan@gmail.com %s. Thank you!', SHPPHE_TEXT ),
                                                                '<a href="mailto:arthurgareginyan@gmail.com?subject=Syntax Highlighter for Post/Page HTML Editor">',
                                                                '</a>'
                                                          );
                                              ?></div>

                        <div class="question-11"><?php _e( 'I love this plugin! Can I help somehow?', SHPPHE_TEXT ); ?></div>
                        <div class="answer-11"><?php printf(
                                                            __( 'Yes, any financial contributions are welcome! Just visit %s my website %s, click on the donate button, and thank you!', SHPPHE_TEXT ),
                                                                '<a href="http://www.arthurgareginyan.com/donate.html" target="_blank">',
                                                                '</a>'
                                                           );
                                              ?></div>

                    </div>
                </div>
            </div>
            <!-- END-TAB 3 -->

            <!-- TAB 4 -->
            <div class="tab-page fade" id="tab-author">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Author', SHPPHE_TEXT ); ?></h3>
                    <div class="inside include-tab-author"></div>
                </div>
            </div>
            <!-- END-TAB 4 -->

            <!-- TAB 5 -->
            <div class="tab-page fade" id="tab-support">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Support', SHPPHE_TEXT ); ?></h3>
                    <div class="inside include-tab-support"></div>
                </div>
            </div>
            <!-- END-TAB 5 -->

            <!-- TAB 6 -->
            <div class="tab-page fade" id="tab-family">
                <div class="include-tab-family"></div>
            </div>
            <!-- END-TAB 6 -->

            <div class="additional-css"></div>

        </div>

    </div>
    <?php
}
