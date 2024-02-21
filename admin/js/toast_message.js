function toast({ title = "", message = "", type = "info", duration = 3000 }) {
  const main = document.getElementById("toast");
  if (main) {
    const toast = document.createElement("div");
    const autoRemoveId = setTimeout(function () {
        main.removeChild(toast)
    }, duration + 3000);

    toast.onclick = function(e) {
        if (e.target.closest('.toast__close')) {
            main.removeChild(toast);
            clearTimeout(autoRemoveId);
        }
    }
    const icons = {
        success: 'fa-circle-check',
        info: 'fa-circle-info',
        warning: 'fa-triangle-exclamation',
        error: 'fa-circle-exclamation',
    }
    const icon = icons[type];
    const delay = (duration/1000).toFixed(2);

    toast.classList.add("toast", `toast--${type}`);
    toast.style.animation = `slideInLeft ease .4s , fadeOut linear 1.5s ${delay}s forwards`;
    toast.innerHTML = `
        <div class="toast__icon">
            <i class="fa-solid ${icon}"></i>
        </div>
        <div class="toast__body">
            <h3 class="toast__title">${title}</h3>
            <p class="toast__msg">${message}</p>
        </div>
        <div class="toast__close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    `;
    main.appendChild(toast);
    
  }
}
