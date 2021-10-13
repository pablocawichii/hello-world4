$(document).ready(() => {
    $("#sign_up").hide()

    $("#signup").click(() => {
        $("#sign_up").toggle()
    })

    $("#message").click(() => {

        $('#exampleModal').modal('hide')
    })
})