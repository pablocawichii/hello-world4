$(document).ready(() => {
  $outside = $("#outside");
  $gridCheck = $("#gridCheck");

  $outside.hide();

  $("#search").submit((e) => {
    e.preventDefault();
    console.log("test");
  });

  $(function () {
    var popover = $('[data-toggle="popover"]')
      .popover({
        placement: "bottom",
        html: true,
      })
      .on("inserted.bs.popover", () => {
        $.ajax({
          url: "./cart.php",
          success: (html) => {
            popover.attr("data-content", html).data("bs.popover").setContent();
          },
        });
      });
  });

  $("button.add_to_cart").on("click", (e) => {
    id = $(e.target).attr("data-id");
    $.ajax({
      type: "POST",
      url: "./add_to_cart.php",
      data: {
        id: id,
      },
    }).done((msg) => {
      $("#hid").load("./items_in_cart.php", (msg) => {
        $("#fix").attr("data-id", msg);
      });
    });
  });

  $("#hid").load("./items_in_cart.php", (msg) => {
    $("#fix").attr("data-id", msg);
  });

  $(".popover-dismiss").popover({
    trigger: "focus",
  });

  $gridCheck.change((e) => {
    console.log(e);
    if (e.target.checked == true) {
      $outside.show();
    } else {
      $outside.hide();
    }
  });
});
