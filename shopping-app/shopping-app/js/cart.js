$(document).ready(() => {
  $("button.remove_from_cart").on("click", (e) => {
    id = $(e.target).attr("data-id");
    $("#hid").load("./remove_from_cart.php", { id: id }, () => {
      $("#cart").load("./cart.php", {}, (html) => {
        $("cart").html(html);
      });
    });
    $("#hid").load("./items_in_cart.php", (msg) => {
      $("#fix").attr("data-id", msg);
    });
  });

  $("button.increase_from_cart").on("click", (e) => {
    id = $(e.target).attr("data-id");
    $("#hid").load("./increase_cart.php", { id: id }, () => {
      $("#cart").load("./cart.php", {}, (html) => {
        $("cart").html(html);
      });
    });
  });
  $("button.decrease_from_cart").on("click", (e) => {
    id = $(e.target).attr("data-id");
    $("#hid").load("./decrease_cart.php", { id: id }, () => {
      $("#cart").load("./cart.php", {}, (html) => {
        $("cart").html(html);
      });
    });
  });
});
