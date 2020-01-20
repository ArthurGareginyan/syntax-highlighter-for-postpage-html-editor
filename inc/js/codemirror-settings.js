/*
 * CodeMirror editor settings
 *
 * @package     Syntax Highlighter for Post/Page HTML Editor
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2017-2020 Space X-Chimp. All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // Get values for variables
    var theme = spacexchimp_p014_scriptParams["theme"];
    var line_numbers = ( spacexchimp_p014_scriptParams["line_numbers"] == 'true' );
    var first_line_number = parseInt( spacexchimp_p014_scriptParams["first_line_number"] );
    var line_wrapping = ( spacexchimp_p014_scriptParams["line_wrapping"] == 'true' );
    var tab_size = parseInt( spacexchimp_p014_scriptParams["tab_size"] );

    // Find textareas on page and replace them with the CodeMirror editor
    $('textarea').each(function(index, element){
        var editor = CodeMirror.fromTextArea(element, {
            lineNumbers: line_numbers,
            firstLineNumber: first_line_number,
            lineWrapping: line_wrapping,
            matchBrackets: true,
            indentUnit: tab_size,
            theme: theme,
            mode: 'text/html',
            autoRefresh: true,
            readOnly: false
        });
    });

});
