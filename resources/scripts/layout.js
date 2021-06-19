window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});

let datePickers = $('.datepicker');

if (datePickers) {
    datePickers.datepicker({ dateFormat: 'Y-mm-dd' });
}

$(document).ready(function() {
    let jsMultiple = $('.js-example-basic-multiple');
    if (jsMultiple.length) {
        jsMultiple.select2();
    }

    let jsMultipleSeries = $('.js-example-basic-multiple-series');
    if (jsMultipleSeries.length) {
        jsMultipleSeries.select2();
    }

    let jsMultipleGroup = $('.js-example-basic-multiple-group');
    if (jsMultipleGroup.length) {
        jsMultipleGroup.select2();
    }

    let jsSimple = $('.js-example-basic-single');
    if (jsSimple.length) {
        jsSimple.select2();
    }
});

$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
