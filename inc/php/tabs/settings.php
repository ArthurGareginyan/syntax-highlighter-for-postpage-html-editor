<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab Content
 */
?>
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( $plugin['settings'] . '_settings_group' ); ?>

                    <?php
                        // Preparing an array with the names of themes
                        $themes = spacexchimp_p014_get_codemirror_theme_pairs();
                        $themes_plus = array( 'default' => 'Default' ) + $themes;
                    ?>

                    <!-- SUBMIT -->
                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg button-save-top">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span><?php _e( 'Save changes', $plugin['text'] ); ?></span>
                    </button>
                    <!-- END SUBMIT -->

                    <div class="postbox" id="options-group-editor">
                        <h3 class="title"><?php _e( 'Code editor settings', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can customize the code editor.', $plugin['text'] ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p014_control_list( 'theme',
                                                                    $themes_plus,
                                                                   __( 'Color theme', $plugin['text'] ),
                                                                   __( 'You can choose the theme which you like to view.', $plugin['text'] ),
                                                                   'default'
                                                                 );
                                    spacexchimp_p014_control_separator(
                                                                        __( 'Options', $plugin['text'] )
                                                                      );
                                    spacexchimp_p014_control_switch( 'line_numbers',
                                                                     __( 'Line numbering', $plugin['text'] ),
                                                                     __( 'Display the line numbers in the code block.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p014_control_number( 'first_line_number',
                                                                     __( 'First line number', $plugin['text'] ),
                                                                     __( 'You can set the number of the first line.', $plugin['text'] ),
                                                                     '0'
                                                                   );
                                    spacexchimp_p014_control_switch( 'line_wrapping',
                                                                     __( 'Line wrapping', $plugin['text'] ),
                                                                     __( 'Enable wrapping for long lines. By default, long lines will scroll.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p014_control_number( 'tab_size',
                                                                     __( 'Tab character size', $plugin['text'] ),
                                                                     __( 'The width (in spaces) of the Tab character. Default is 4.', $plugin['text'] ),
                                                                     '4'
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <!-- HIDDEN -->
                    <?php
                        spacexchimp_p014_control_hidden( 'hidden_scrollto',
                                                         '0'
                                                       );
                    ?>
                    <!-- END HIDDEN -->

                    <!-- SUBMIT -->
                    <input type="submit" name="submit" id="submit" class="btn btn-default btn-lg button-save-main" value="<?php _e( 'Save changes', $plugin['text'] ); ?>">
                    <!-- END SUBMIT -->

                    <!-- PREVIEW -->
                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Preview', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save changes" button to update this preview.', $plugin['text'] ); ?></p>
                            <?php
                                // Put the example in a variable
                                $example = '<h1>Sticky Post</h1>

<p>This is a sticky post.</p>

There are a few things to verify:
    <ul>
        <li>The sticky post should be distinctly recognizable in some way in comparison to normal posts. You can style the <code>.sticky</code> class if you are using the <a title="WordPress Codex post_class() Function" href="https://codex.wordpress.org/Function_Reference/post_class" target="_blank">post_class()</a> function to generate your post classes, which is a best practice.</li>
        <li>They should show at the very top of the blog index page, even though they could be several posts back chronologically.</li>
        <li>They should still show up again in their chronologically correct postion in time, but without the sticky indicator.</li>
        <li>If you have a plugin or widget that lists popular posts or comments, make sure that this sticky post is not always at the top of those lists unless it really is popular.</li>
    </ul>

<a title="WordPress Codex post_class() Function" href="https://codex.wordpress.org/Function_Reference/post_class" target="_blank">post_class()</a>

<div class="example">
    This    is  an
    example of  smart
    tabs.
</div>';
                            ?>
                            <textarea readonly id="SHighlighterForPPHE"><?php echo $example; ?></textarea>
                            <p><?php _e( 'This is an example of HTML markup.', $plugin['text'] ); ?></p>
                        </div>
                    </div>
                    <!-- END PREVIEW -->

                    <!-- SUPPORT -->
                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Every little contribution helps to cover our costs and allows us to spend more time creating things for awesome people like you to enjoy.', $plugin['text'] ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                                <span class="btn-label">
                                    <img src="<?php echo $plugin['url'] . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                </span>
                                <?php _e( 'Donate with PayPal', $plugin['text'] ); ?>
                            </a>
                            <p><?php _e( 'Thanks for your support!', $plugin['text'] ); ?></p>
                        </div>
                    </div>
                    <!-- END SUPPORT -->

                </form>

            </div>
        </div>
    </div>
<?php
