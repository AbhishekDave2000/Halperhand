$(document).ready(function() {

    $('#dashboard-datatable').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
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

    $('#service-history-datatable').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "bFilter": false, //hide Search bar
        "pagingType": "full_numbers",
        paging: true,
        "pagingType": "full_numbers",
        bFilter: false,
        ordering: true,
        searching: false,
        info: true,
        "columnDefs": [{
            "orderable": false,
            "targets": 5
        }],
        "oLanguage": {
            "sInfo": "Total Records: _TOTAL_"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
    });

    $('#favpro-datatable').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "bFilter": false, //hide Search bar
        paging: true,
        "pagingType": "full_numbers",
        // bFilter: false,
        ordering: true,
        searching: false,
        // info: true,
        "oLanguage": {
            "sInfo": "Total Records: _TOTAL_"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
    });
    
});