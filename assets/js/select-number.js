const minusBtn = document.querySelector(".select__number--minus");
const plusBtn = document.querySelector(".select__number--plus");

function showErrorToast() {
  toast({
      title: "Error",
      message: "Không thể vượt quá số lượng còn lại",
      type: "error",
      duration: 3000,
    });
}

/**
 * Hàm tăng số lượng
 * Author: THINHDH(12/04/2023)
 */
function increaseQuantity() {
    var quantityTotal = parseInt(document.querySelector(".quantity-total").innerHTML);
    var valueNumber = document.querySelectorAll(".select__number--value");
    for (let index = 0; index < valueNumber.length; index++) {
      var number = parseFloat(valueNumber[index].getAttribute("value")); 
      if (number < quantityTotal) {
        valueNumber[index].setAttribute("value", number + 1);
      } else {
        showErrorToast();
      }
    }
}

/**
 * Hàm giảm số lượng
 * Author: THINHDH(12/04/2023)
 */
function decreaseQuantity() {
  var quantityTotal = parseInt(document.querySelector(".quantity-total").innerHTML);
  var valueNumber = document.querySelectorAll(".select__number--value");
  for (let index = 0; index < valueNumber.length; index++) {
    var number = parseFloat(valueNumber[index].getAttribute("value")); 
    if (number > 1) {
      valueNumber[index].setAttribute("value", number - 1);
    }
  }
}