var options = {
    cssClass: 'elfinder'
};
var fm = $('.elfinder').elfinder(options).elfinder('instance');
fm.getCommand('quicklook').window.on('open', function(){
    $(this).hide().promise().done(function() {
        $(this).show();
    });
});