$(function () {
    var imgExt = [
        'png',
        'jpe',
        'jpeg',
        'gif',
        'bmp',
        'jpg',
        'ico',
        'tiff',
    ];

    $('#elfinder').elfinder(
        // 1st Arg - options
        {
            // Disable CSS auto loading
            cssAutoLoad: false,

            // Base URL to css/*, js/*
            baseUrl: './',

            // Connector URL
            url: '/finder-connector',

            // Callback when a file is double-clicked
            getFileCallback: function (file) {
                // ...
            },
        },
    );

    $('._select_file').on('click', function(e) {
        var name = $(this).data('name');
        var fm = $('<div/>').dialogelfinder({
            url: '/finder-connector',
            width : 840,
            destroyOnClose : true,
            getFileCallback : function(files, fm) {
                $('#file_' + name).val(files.path);
                $('#__imgPrev_' + name).html('');

                if(imgExt.indexOf(files.path.split('.').pop()) >= 0){
                    var img = document.createElement('img');
                    img.setAttribute('src', '/resources/' + files.path);
                    img.style = "max-width:300px; max-height:300px";

                    $('#__imgPrev_' + name).html(img);
                }

                console.log(files);
            },
            commandsOptions : {
                getfile : {
                    oncomplete : 'close',
                    folders : true
                }
            }
        }).dialogelfinder('instance');
    });
});