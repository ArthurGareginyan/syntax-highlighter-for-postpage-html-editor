/*
 * Settings of CodeMirror editor
 *
 * @package     Syntax Highlighter for Post/Page HTML Editor
 * @uthor       Arthur Gareginyan
 * @link        https://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2017 Arthur Gareginyan. All Rights Reserved.
 * @since       2.1
 */


jQuery(document).ready(function($) {

    "use strict";

    // Get values for variables
    var line_numbers = ( SHighlighterForPPHE_scriptParams["line_numbers"] == 'true' );
    var first_line_number = parseInt( SHighlighterForPPHE_scriptParams["first_line_number"] );
    var line_wrapping = ( SHighlighterForPPHE_scriptParams["line_wrapping"] == 'true' );
    var tab_size = parseInt( SHighlighterForPPHE_scriptParams["tab_size"] );
    var theme = SHighlighterForPPHE_scriptParams["theme"];
    var mode = SHighlighterForPPHE_scriptParams["mode"];

    // Find textareas on page
    $('textarea').each(function(index, elements) {

        // Change editor to CodeMirror
        var editor = CodeMirror.fromTextArea( elements , {
                                lineNumbers: line_numbers,
                                firstLineNumber: first_line_number,
                                lineWrapping: line_wrapping,
                                matchBrackets: true,
                                indentUnit: tab_size,
                                readOnly: false,
                                theme: theme,
                                mode: 'text/html'
        });

        // Refresh CodeMirror editor
        editor.refresh();

    });

});
