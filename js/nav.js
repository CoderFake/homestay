let isMargin = false;
function showSubnav() {
	const extElement = document.querySelector('.ext');
	const setElement = document.querySelector('.settings');
	if (extElement) {
		if (!isMargin) {
            extElement.style.marginTop = window.isAdminLoggedIn ? '170px' : '140px';
			extElement.style.borderTop = '1px solid rgba(255, 255, 255, 0.10)';
			setElement.classList.add('clicked');
			setElement.classList.add('diriection');
			isMargin = true;
		} else {
			setElement.classList.remove('clicked');
			setElement.classList.remove('diriection');
			setTimeout(function() {
				extElement.style.borderTop = 'none';
				extElement.style.marginTop = '0';
				isMargin = false;
			}, 300);
		}
	}
}

function removeToast(){
    const tst = document.querySelector('.tst')
    if(tst) {
        tst.classList.add("hide");
    }
}

$(document).ready(function() {
    const notifications = $(".notifications");
    $(".notice").each(function() {
        var toastInput = $(this).text();
        const index = toastInput.indexOf(":");
        const type = index !== -1 ? toastInput.substring(0, index) : "";
        const message = index !== -1 ? toastInput.substring(index + 1) : toastInput;
        var id = type.trim();
        const toastDetails = {
            timer: 5000,
            success: {
              icon: 'fa-circle-check',
              text: message,
            },
            error: {
              icon: 'fa-circle-xmark',
              text: message,
            },
            warning: {
                icon: 'fa-triangle-exclamation',
                text: message,
            },
        };
        const removeToast = (tst) => {
        if (tst.timeoutId) clearTimeout(tst.timeoutId);
        setTimeout(() => tst.remove(), 500);
    };
        const createToast = (id) => {
        const { icon, text } = toastDetails[id];
        const tst = $(document.createElement("li"));
        tst.addClass(`tst ${id}`);
        tst.html(`<div class="column">
                            <i class="fa-solid ${icon}"></i>
                            <span>${text}</span>
                       </div>
                       <i class="fa-solid fa-xmark" onclick=removeToast()></i>`);
        notifications.append(tst);
        tst[0].timeoutId = setTimeout(() => removeToast(tst), toastDetails.timer);
        };

        if (id) {
          createToast(id);
        }
    });
});
function createToast(type, message) {
    const toastDetails = {
        success: {
            icon: 'fa-circle-check',
            color: 'green',
        },
        error: {
            icon: 'fa-circle-xmark',
            color: 'red',
        }
    };

    const detail = toastDetails[type];
    const tst = $('<li>').addClass(`tst ${type}`).html(`
        <div class="column" style="color: ${detail.color};">
            <i class="fa-solid ${detail.icon}"></i>
            <span>${message}</span>
       </div>
       <i class="fa-solid fa-xmark"></i>`);

    $(".notifications").append(tst);
    tst.find('.fa-xmark').click(function() { $(this).parent().remove(); });
    setTimeout(() => tst.remove(), 5000);
}
function load() {
    $('#Overlay').empty();
    $('#Overlay').fadeIn();
    $('#Overlay').append(`
        <div class="load">
            <hr/><hr/><hr/><hr/>
        </div>
    `)
}

function closeload() {
    setTimeout(function () {
        $('#Overlay').empty();
        $('#Overlay').fadeOut();
        $('#Overlay').append(`
            <div id="overlayContent"></div>
            <button type="button" class="close" id ="closeOverlay" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        `)
    }, 1000);
}