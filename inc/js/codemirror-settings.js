/*
 * Settings of CodeMirror editor
 *
 * @package     Syntax Highlighter for Post/Page HTML Editor
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2017-2018 Space X-Chimp. All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // Get values for variables
    var line_numbers = ( spacexchimp_p014_scriptParams["line_numbers"] == 'true' );
    var first_line_number = parseInt( spacexchimp_p014_scriptParams["first_line_number"] );
    var line_wrapping = ( spacexchimp_p014_scriptParams["line_wrapping"] == 'true' );
    var tab_size = parseInt( spacexchimp_p014_scriptParams["tab_size"] );
    var theme = spacexchimp_p014_scriptParams["theme"];
    var mode = spacexchimp_p014_scriptParams["mode"];

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
