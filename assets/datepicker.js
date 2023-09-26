import 'bootstrap-datepicker/js/bootstrap-datepicker';
import 'bootstrap-datepicker/js/locales/bootstrap-datepicker.fr';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';
$(function (){
    $('.js-datepicker input').each(function () {
        $(this).datepicker({
            format: 'D d MM'
        });
    });
});