import './styles/app.scss';
import './styles/register.scss';
import $ from 'jquery';
import ChartConfig from "./js/ChartConfig";

$('#report-upload').change(() => {
    $('.pending-upload').addClass('hidden');
    $('.success-upload').removeClass('hidden');
});

$('.action-upload').click(() => {
    $('#report-upload').trigger('click');
});

$('#graph-type-right').click(() => {
    const current = $('.graph-type.selected');
    let next = current.next();

    if (!next.length) {
        next = $('.graph-type-list > li:first-of-type');
    }

    current.removeClass('selected');
    next.addClass('selected');
    next.find('input').attr('checked', 'checked');
});

$('#graph-type-left').click(() => {
    const current = $('.graph-type.selected');
    let next = current.prev();

    if (!next.length) {
        next = $('.graph-type-list > li:last-of-type');
    }

    current.removeClass('selected');
    next.addClass('selected');
    next.find('input').attr('checked', 'checked');
});

$('#action-create').click(() => {
    $('#report-form').submit();
});


if ($('#chart-data').length ) {
    const chartData = $('#chart-data').data('chart');
    const chart = new Chart($('#dataviz-chart'), ChartConfig.load(chartData.type, chartData.data));

}

// const doc = new jsPDF({
//     orientation: 'landscape'
// });
//
// window.html2canvas = html2canvas;
//
// $('#dataviz-export').click(() => {
//     // Convert_HTML_To_PDF()
//     $('#dataviz-export').click(() => {
//         doc.html($('#data-visualization')[0], {
//             callback: function (doc) {
//                 doc.save('dot.pdf');
//             }
//         });
//     });
// });