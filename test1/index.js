$(document).ready(() => {
    $("#sign_up").hide()

    $("#signup").click(() => {
        $("#sign_up").toggle()
    })



    $("#signform").submit((e) => {
        $("#sign_up").hide()
        $("#signform").trigger("reset");
        e.preventDefault();
    })

    $("#myform").submit((e) => {
        $("#myform").trigger("reset");
        $('#exampleModal').modal('hide')
        e.preventDefault();
    })
})