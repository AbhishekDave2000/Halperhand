$(document).ready(function () {
    $('#example').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "columnDefs": [{
            "orderable": false,
            "targets": 5
        }],
        "bFilter": false, //hide Search bar
        "pagingType": "full_numbers",
        paging: true,
        "pagingType": "full_numbers",
        // bFilter: false,
        ordering: true,
        searching: false,
        info: true,
        "columnDefs": [{
            "orderable": false,
            "targets": 4
        }],
        "oLanguage": {
            "sInfo": "Total Records: _TOTAL_"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
    });
});