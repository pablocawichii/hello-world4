$(document).ready(() => {
    /* Section 1 */

    // 1
    let $text = $('.bg-blue-transparent.simple')
    $text.text("This text is added here through jquery.")
    
    // 2
    $text.parent().append("<br><button id='readmore' class='btn btn-info'>Read More</button>")
    $text.parent().append("<button id='less' class='btn btn-info'>Less</button>")
    $more = $('#readmore')
    $less = $('#less')

    // 3

    // 4
    $text.hide()
    $less.hide()

    $less.click(() => {
        $text.hide()
        $more.show()
        $less.hide()
    })

    $more.click(() => {
        $text.show()
        $less.show()
        $more.hide()
    })

    // 5
    // I added a class called bg-green-transparent to the tooplate-simply
    // css file
    $text.mouseover(() => {
        $text.toggleClass('bg-blue-transparent')
        $text.toggleClass('bg-green-transparent')
    })
    $text.mouseleave(() => {
        $text.toggleClass('bg-blue-transparent')
        $text.toggleClass('bg-green-transparent')
    })

    $('#form-alert').hide()
    // Section 2
    $( "#target" ).submit(( event ) => {
        $('#form-alert').hide()
        let final_text = " has an error."
        let have_error = false;
        
        if(!isEmail($('#email').val())){
            have_error = true;
            
            final_text = "Email" + final_text
        }
        
        if(have_error == true){
            $('#form-alert').show()
            $('#form-alert').text(final_text)
        }

        event.preventDefault();
      });
})

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
