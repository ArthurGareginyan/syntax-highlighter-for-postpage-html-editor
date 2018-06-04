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
                    <?php settings_fields( SPACEXCHIMP_P014_SETTINGS . '_settings_group' ); ?>

                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg button-save-top">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span><?php _e( 'Save changes', $text ); ?></span>
                    </button>

                    <div class="postbox" id="settings">
                        <h3 class="title"><?php _e( 'Main Settings', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can configure this plugin.', $text ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p014_control_list( 'theme',
                                                                    array(
                                                                           'default'                 => 'Default',
                                                                           '3024-day'                => '3024 day',
                                                                           '3024-night'              => '3024 night',
                                                                           'ambiance-mobile'         => 'Ambiance mobile',
                                                                           'ambiance'                => 'Ambiance',
                                                                           'base16-dark'             => 'Base16 dark',
                                                                           'base16-light'            => 'Base16 light',
                                                                           'blackboard'              => 'Blackboard',
                                                                           'cobalt'                  => 'Cobalt',
                                                                           'colorforth'              => 'Colorforth',
                                                                           'eclipse'                 => 'Eclipse',
                                                                           'elegant'                 => 'Elegant',
                                                                           'erlang-dark'             => 'Erlang dark',
                                                                           'lesser-dark'             => 'Lesser dark',
                                                                           'liquibyte'               => 'Liquibyte',
                                                                           'mbo'                     => 'MBO',
                                                                           'mdn-like'                => 'MDN like',
                                                                           'midnight'                => 'Midnight',
                                                                           'monokai'                 => 'Monokai',
                                                                           'neat'                    => 'Neat',
                                                                           'neo'                     => 'Neo',
                                                                           'night'                   => 'Night',
                                                                           'paraiso-dark'            => 'Paraiso dark',
                                                                           'paraiso-light'           => 'Paraiso light',
                                                                           'pastel-on-dark'          => 'Pastel on dark',
                                                                           'rubyblue'                => 'Rubyblue',
                                                                           'solarized'               => 'Solarized',
                                                                           'the-matrix'              => 'The matrix',
                                                                           'tomorrow-night-bright'   => 'Tomorrow night bright',
                                                                           'tomorrow-night-eighties' => 'Tomorrow night eighties',
                                                                           'ttcn'                    => 'TTCN',
                                                                           'twilight'                => 'Twilight',
                                                                           'vibrant-ink'             => 'Vibrant ink',
                                                                           'xq-dark'                 => 'XQ dark',
                                                                           'xq-light'                => 'XQ light',
                                                                           'zenburn'                 => 'Zenburn'
                                                                         ),
                                                                   __( 'Color theme', $text ),
                                                                   __( 'You can choose the theme which you like to view.', $text ),
                                                                   'default'
                                                                 );
                                    spacexchimp_p014_control_switch( 'line_numbers',
                                                                     __( 'Line numbers', $text ),
                                                                     __( 'Display the line numbers in the code block.', $text )
                                                                   );
                                    spacexchimp_p014_control_number( 'first_line_number',
                                                                     __( 'First line number', $text ),
                                                                     __( 'You can set the number of the first line.', $text ),
                                                                     '0'
                                                                   );
                                    spacexchimp_p014_control_switch( 'line_wrapping',
                                                                     __( 'Line wrapping', $text ),
                                                                     __( 'Enable the line wrapping.', $text )
                                                                   );
                                    spacexchimp_p014_control_number( 'tab_size',
                                                                     __( 'Size of Tab', $text ),
                                                                     __( 'The width (in spaces) of Tab. Default is 4.', $text ),
                                                                     '4'
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" class="btn btn-default btn-lg button-save-main" value="<?php _e( 'Save changes', $text ); ?>">

                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Preview', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save changes" button to update this preview.', $text ); ?></p>
                            <?php
                                // Put the example in a variable
                                $example = '<h1>Sticky Post</h1>

<p>This is a sticky post.</p>

There are a few things to verify:
    <ul>
        <li>The sticky post should be distinctly recognizable in some way in comparison to normal posts. You can style the <code>.sticky</code> class if you are using the <a title="WordPress Codex post_class() Function" href="https://codex.wordpress.org/Function_Reference/post_class" target="_blank">post_class()</a> function to generate your post classes, which is a best practice.</li>
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
                            <p><?php _e( 'This is an example of HTML markup.', $text ); ?></p>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $text ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', $text ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                                                        <span class="btn-label">
                                                            <img src="<?php echo SPACEXCHIMP_P014_URL . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                                        </span>
                                                        <?php _e( 'Donate with PayPal', $text ); ?>
                                                </a>
                            <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php
