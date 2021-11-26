$(document).ready(() => {
  $creditCardTab = $("#credit-card-tab");
  $creditCard = $("#credit-card");
  $debitCardTab = $("#debit-card-tab");
  $debitCard = $("#debit-card");

  $debitCardTab.click(() => {
    $creditCard.fadeOut(200, () => {
      $debitCard.fadeIn(200);
    });
  });
  $creditCardTab.click(() => {
    $debitCard.fadeOut(200, () => {
      $creditCard.fadeIn(200);
    });
  });

  $("#cart").load("./cart.php", {}, (html) => {
    $("cart").html(html);
  });
  $("#checkoutForm").submit(function (e) {
    e.preventDefault();
    this.submit();
    window.location.replace("./index.php");
  });
});
