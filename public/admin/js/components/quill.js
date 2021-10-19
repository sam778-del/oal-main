(function($) {
    'use strict';
    $(function () {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        ///AutoSave//
        var Delta = Quill.import('delta');
        var quill = new Quill('#editor1', {
            modules: {
                toolbar: true
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
        });

        // Store accumulated changes
        var change = new Delta();
            quill.on('text-change', function(delta) {
            change = change.compose(delta);
        });

        // Save periodically
        setInterval(function() {
            if (change.length() > 0) {
                alert('Changes Saved');
                /*
                Send partial changes
                $.post('/your-endpoint', {
                  partial: JSON.stringify(change)
                });

                Send entire document
                $.post('/your-endpoint', {
                  doc: JSON.stringify(quill.getContents())
                });
                */
                change = new Delta();
            }
        }, 5*1000);

        // Check for unsaved data
        window.onbeforeunload = function() {
            if (change.length() > 0) {
                return 'There are unsaved changes. Are you sure you want to leave?';
            }
        }

        ///ALL Options///
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];
        var editor = new Quill('#editor2', {
            modules: { toolbar: toolbarOptions },
            theme: 'snow'
        });
        //Inline Editor
        var quill = new Quill('#editor3', {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block']
                ]
            },
            scrollingContainer: '#scrolling-container',
            placeholder: 'Compose an epic...',
            theme: 'bubble'
        });
    });
})(jQuery);