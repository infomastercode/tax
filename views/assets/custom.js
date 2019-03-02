var base_url = $("#base_url").val();
 
$(document).ready(function () {
    get_list();
});

function get_list() {
    $('#tbl_list').dynatable({
        dataset: {
            ajax: true,
            ajaxMethod: 'POST',
            ajaxUrl: base_url + 'tax_form/getListRecord',
            ajaxOnLoad: true,
            records: []
        }
    });
}
