function init_quill(editor_div, announcement_id){

    let toolbarOptions = [

        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        //['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        //[{ 'header': [1, 2, 3, 4, 5, 6, false] }], //disable header sizes cus those break the displaying announcements

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean']                                        // add a remove formatting button,


    ];

    let quill = new Quill("#" + editor_div.attr('id'), {
        theme: 'snow',
        placeholder: 'Tell a bit about yourself',
        modules: {
            toolbar: toolbarOptions
        }
    });

    return quill;

}
let editor_div = $("#editorBox");
init_quill(editor_div, 0).enable();