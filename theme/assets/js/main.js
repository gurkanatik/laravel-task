import * as jQuery from '../plugins/jquery/jquery-3.3.1.js'
import "../plugins/bootstrap/js/bootstrap.bundle.min.js"

$('.opener').on('click', function (){
    const activateEl = $(this).attr('data-activate')
    $(activateEl+', body').toggleClass('active')

})