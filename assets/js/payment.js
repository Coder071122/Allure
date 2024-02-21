var paymentItem = document.querySelectorAll(".payment__item");
var paymentRadio = document.querySelectorAll(".payment__radio");

for (let i = 0; i < paymentRadio.length; i++) {
  paymentRadio[i].addEventListener("change", function () {
    for (let i = 0; i < paymentRadio.length; i++) {
      if (paymentRadio[i].checked) {
        paymentItem[i].classList.add("checked");
      } else {
        paymentItem[i].classList.remove("checked");
      }
    }
  });
}
