function getInputChange() {
    var inputForms = document.querySelectorAll(".input-form");
    var titleLine = document.querySelector(".title-line");
    var count = 0;
    var total = inputForms.length;
  
    for (var i = 0; i < inputForms.length; i++) {
      if (inputForms[i].value !== "") {
        count++;
      }
    }
  
    var lineWidth = (100 / total) * count;
    titleLine.style.width = lineWidth + "%";
  }
