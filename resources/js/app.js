require('./bootstrap');
require('./selectfile');

$(function(){
    $('.datatable').DataTable();
    $('.datatable').attr('style', 'border-collapse: collapse !important');
});
