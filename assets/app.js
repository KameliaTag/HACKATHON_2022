import './styles/app.scss';
import './styles/register.scss';
import $ from 'jquery';

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
    console.log($('#report-form'));
    $('#report-form').submit();
});

function createReport() {

}

function addComponent() {

}