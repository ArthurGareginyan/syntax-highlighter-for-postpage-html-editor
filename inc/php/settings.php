<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Tab
 *
 * @since 1.0
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div id="about" class="postbox">
                <h3 class="title"><?php _e( 'About', SHPPHE_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin replaces the defaults WordPress Post/Page HTML Editor with an enhanced editor with syntax highlighting and line numbering.', SHPPHE_TEXT ); ?></p>
                </div>
            </div>

            <div id="support" class="postbox">
                <h3 class="title"><?php _e( 'Support', SHPPHE_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', SHPPHE_TEXT ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', SHPPHE_TEXT ); ?></a>
                    <p><?php _e( 'Thanks for your support!', SHPPHE_TEXT ); ?></p>
                </div>
            </div>

            <div id="help" class="postbox">
                <h3 class="title"><?php _e( 'Help', SHPPHE_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'Got something to say? Need help?', SHPPHE_TEXT ); ?></p>
                    <p><a href="mailto:arthurgareginyan@gmail.com?subject=Syntax Highlighter for Post/Page HTML Editor">arthurgareginyan@gmail.com</a></p>
                </div>
            </div>

        </div>
    </div>
    <!-- END-SIDEBAR -->

    <!-- FORM -->
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form name="SHighlighterForPPHE-form" action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( 'SHighlighterForPPHE_settings_group' ); ?>

                    <?php
                        // Get options from the BD
                        $options = get_option( 'SHighlighterForPPHE_settings' );

                        // Declare variables
                        $example = '<h1>Sticky Post</h1>

<p>This is a sticky post.</p>

There are a few things to verify:
    <ul>
        <li>The sticky post should be distinctly recognizable in some way in comparison to normal posts. You can style the <code>.sticky</code> class if you are using the <a title="WordPress Codex post_class() Function" href="http://codex.wordpress.org/Function_Reference/post_class" target="_blank">post_class()</a> function to generate your post classes, which is a best practice.</li>
        <li>They should show at the very top of the blog index page, even though they could be several posts back chronologically.</li>
        <li>They should still show up again in their chronologically correct postion in time, but without the sticky indicator.</li>
        <li>If you have a plugin or widget that lists popular posts or comments, make sure that this sticky post is not always at the top of those lists unless it really is popular.</li>
    </ul>

<a title="WordPress Codex post_class() Function" href="http://codex.wordpress.org/Function_Reference/post_class" target="_blank">post_class()</a>

<div class="example">
    This    is  an
    example of  smart
    tabs.
</div>';
                    ?>

                    <div class="postbox" id="Settings">
                        <h3 class="title"><?php _e( 'Main Settings', SHPPHE_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', SHPPHE_TEXT ); ?></p>

                            <table class="form-table">

                                <tr>
                                    <th>
                                        <?php _e( 'Color theme:', SHPPHE_TEXT ); ?>
                                    </th>
                                    <td>
                                        <select name="SHighlighterForPPHE_settings[theme]">
                                            <?php
                                                $themes = array('default', '3024-day', '3024-night', 'ambiance-mobile', 'ambiance', 'base16-dark', 'base16-light', 'blackboard', 'cobalt', 'colorforth', 'eclipse', 'elegant', 'erlang-dark', 'lesser-dark', 'liquibyte', 'mbo', 'mdn-like', 'midnight', 'monokai', 'neat', 'neo', 'night', 'paraiso-dark', 'paraiso-light', 'pastel-on-dark', 'rubyblue', 'solarized', 'the-matrix', 'tomorrow-night-bright', 'tomorrow-night-eighties', 'ttcn', 'twilight', 'vibrant-ink', 'xq-dark', 'xq-light', 'zenburn');
                                                foreach ($themes as $option) {
                                                    $selected = selected( $options['theme'], $option );
                                                    echo '<option value="' . $option . '" id="' . $option . '"' . $selected . ' >' . $option . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'>
                                        <?php _e( 'Theme which you like to view.', SHPPHE_TEXT ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php _e( 'Display line numbers:', SHPPHE_TEXT ); ?>
                                    </th>
                                    <td>
                                        <input type="checkbox" name="SHighlighterForPPHE_settings[line_numbers]" id="SHighlighterForPPHE_settings[line_numbers]" <?php if ( !empty($options['line_numbers']) ) { checked( $options['line_numbers'], "on" ); } ?> >
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php _e( 'First line number:', SHPPHE_TEXT ); ?>
                                    </th>
                                    <td>
                                        <input type="text" name="SHighlighterForPPHE_settings[first_line_number]" id="SHighlighterForPPHE_settings[first_line_number]" size="1" value="<?php if ( !empty($options['first_line_number']) ) { echo $options['first_line_number']; } else { echo "0"; } ?>" >
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php _e( 'Line wrapping:', SHPPHE_TEXT ); ?>
                                    </th>
                                    <td>
                                        <input type="checkbox" name="SHighlighterForPPHE_settings[line_wrapping]" id="SHighlighterForPPHE_settings[line_wrapping]" <?php if ( !empty($options['line_wrapping']) ) { checked( $options['line_wrapping'], "on" ); } ?> >
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php _e( 'The width of Tab:', SHPPHE_TEXT ); ?>
                                    </th>
                                    <td>
                                        <input type="text" name="SHighlighterForPPHE_settings[tab_size]" id="SHighlighterForPPHE_settings[tab_size]" size="1" value="<?php if ( !empty($options['tab_size']) ) { echo $options['tab_size']; } else { echo "4"; } ?>" >
                                    </td>
                                </tr>
                            </table>
                            <?php submit_button( __( 'Save Changes', SHPPHE_TEXT ), 'primary', 'submit', true ); ?>
                        </div>
                    </div>

                    <div class="postbox" id="Preview">
                        <h3 class="title"><?php _e( 'Preview', SHPPHE_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save Changes" button to update this preview.', SHPPHE_TEXT ); ?></p>
                            <textarea readonly id="SHighlighterForPPHE"><?php echo $example; ?></textarea>
                            <p><?php _e( 'This is an example of HTML markup.', SHPPHE_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="support-addition" class="postbox">
                        <h3 class="title"><?php _e( 'Support', SHPPHE_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', SHPPHE_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', SHPPHE_TEXT ); ?></a>
                            <p><?php _e( 'Thanks for your support!', SHPPHE_TEXT ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- END-FORM -->
<?php
