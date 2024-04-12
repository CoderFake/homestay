let isMargin = false;

function showSubnav() {
    const extElement = document.querySelector('.ext');
    const setElement = document.querySelector('.settings');
    if (extElement) {
        if (!isMargin) {
            extElement.style.marginTop = window.isAdminLoggedIn ? '200px' : '170px';
            extElement.style.borderTop = '1px solid rgba(255, 255, 255, 0.10)';
            setElement.classList.add('clicked');
            setElement.classList.add('diriection');
            isMargin = true;
        } else {
            setElement.classList.remove('clicked');
            setElement.classList.remove('diriection');
            setTimeout(function () {
                extElement.style.borderTop = 'none';
                extElement.style.marginTop = '0';
                isMargin = false;
            }, 300);
        }
    }
}

$(document).ready(function () {

    $('.file-selector').click(function (event) {
        event.preventDefault();

    });
    $('.cancel-upload').click(function (event) {
        event.preventDefault();

    });

    $("#submitBtn").click(function () {
        $("#crudform").submit();
    });

    $('.table-select-row').change(function () {
        // Kiểm tra nếu checkbox này được checked
        if ($(this).is(':checked')) {
            // Nếu được checked, ẩn uncheckRoom và hiện checkRoom
            $(this).siblings('.uncheckRoom').addClass('hid');
            $(this).siblings('.checkRoom').removeClass('hid');
        } else {
            // Nếu không được checked, hiện uncheckRoom và ẩn checkRoom
            $(this).siblings('.uncheckRoom').removeClass('hid');
            $(this).siblings('.checkRoom').addClass('hid');
        }
    });
    $('.table-select-row').on('change', function () {
        // Kiểm tra xem có checkbox nào được chọn không
        var anyChecked = $('.table-select-row:checked').length > 0;

        if (anyChecked) {
            // Hiển thị nút nếu có checkbox được chọn
            $('#btnDel').removeClass('hid');
            $('#btnDelUser').removeClass('hid');
            $('#btnEditUser').removeClass('hid');

        } else {
            // Ẩn nút nếu không có checkbox nào được chọn
            $('#btnDel').addClass('hid');
            $('#btnDelUser').addClass('hid');
            $('#btnEditUser').addClass('hid');
        }
    });
    $('.btn-view-control').on('click', function () {
        // Ẩn bảng và hiển thị thông tin chi tiết
        $('.table-view').addClass('hid');
        $('.room-view').removeClass('hid');

        // Lấy giá trị của <input> ở cùng hàng với nút được nhấn
        var searchValue = $(this).siblings('.input-view-control').val();

        // Cập nhật giá trị cho #roomSelect và kích hoạt sự kiện 'change'
        if ($("#roomSelect option[value='" + searchValue + "']").length > 0) {
            $("#roomSelect").val(searchValue).trigger('change');
        }
    });
    $('.btn-edit-control').on('click', function () {
        var searchValue = $(this).siblings('.input-view-control').val();
        window.location.href = '/admin/rooms/up_room.php?room_id=' + searchValue;
    });
    $('.btn-del-control').on('click', function () {
        var searchValue = $(this).siblings('.input-view-control').val();
        window.location.href = '/admin/rooms/rm_room.php?room_id=' + searchValue;
    });

    $('#btnAdd').on('click', function () {
        window.location.href = '/admin/rooms/add_room.php';
    });

});
$(document).ready(function() {
    $('.input-file').on('change', function() {
        // Lấy tên file từ đường dẫn file
        var fileName = $(this).val().split('\\').pop();
        
        
        var fileReturnId = $(this).data('return'); 
        console.log(fileName);
        $(fileReturnId).text(fileName);
    });

    $('.input-file-trigger').click(function(event) {
        event.preventDefault();
        $(this).siblings('.input-file').click(); 
    });
});






function removeToast() {
    const tst = document.querySelector('.tst')
    if (tst) {
        tst.classList.add("hide");
    }
}

$(document).ready(function () {
    const notifications = $(".notifications");
    $(".notice").each(function () {
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
            const {
                icon,
                text
            } = toastDetails[id];
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


$(document).ready(function () {
    // Lấy URL hiện tại
    var currentUrl = window.location.href;

    // Duyệt qua mỗi thẻ <a>
    $('.sidebar-nav a').each(function () {
        var linkUrl = $(this).attr('href');

        // Kiểm tra xem URL hiện tại có chứa đường dẫn của thẻ <a> không
        if (currentUrl.includes(linkUrl)) {
            // Thêm class 'active'
            $(this).addClass('active');

            // Mở rộng menu cha nếu có
            $(this).closest('.collapse').addClass('show');
            // Đánh dấu menu cha là đã mở
            $(this).closest('.sidebar-nav-item').find('.sidebar-nav-link').removeClass('collapsed');
        }
    });

});
$(document).ready(function () {
    var inputs = [{
            inputId: 'price_range',
            outputId: 'price_rangeV',
            formControlId: 'price_input'
        },
        {
            inputId: 'room_range',
            outputId: 'room_rangeV',
            formControlId: 'room_input'
        },
        {
            inputId: 'adult_range',
            outputId: 'adult_rangeV',
            formControlId: 'adult_input'
        },
        {
            inputId: 'child_range',
            outputId: 'child_rangeV',
            formControlId: 'child_input'
        },
    ];

    function formatValue(value, formControlId) {
        if (formControlId.startsWith('price')) {
            return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' vnđ/ngày';
        } else if (formControlId.startsWith('room')) {
            return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' phòng';
        } else if (formControlId.startsWith('adult')) {
            return value + ' người';
        } else if (formControlId.startsWith('child')) {
            return value + ' người';
        }
        return value;
    }

    $.each(inputs, function (index, item) {
        var range = document.getElementById(item.inputId);
        var rangeV = document.getElementById(item.outputId);
        var formControl = document.getElementById(item.formControlId);
        if (range) {
            var setValue = function () {
                var newValue = Number((range.value - range.min) * 100 / (range.max - range.min));
                var newPosition = 10 - (newValue * 0.2);
                rangeV.innerHTML = '<span>' + range.value + '</span>';
                rangeV.style.left = 'calc(' + newValue + '% + (' + newPosition + 'px))';
                formControl.value = formatValue(range.value, item.formControlId);
            };

            $(document).ready(setValue);
            $(range).on('input change', setValue);
        }
    });
});

$(document).ready(function () { // Sau khi đã thêm tất cả các checkboxes
    $('.facilities-checkbox').change(function () {
        if (this.checked) {
            // Nếu checkbox được chọn, cập nhật value
            $(this).val(1);
        } else {
            // Nếu checkbox không được chọn, cập nhật value
            $(this).val(0);
        }
    });

});


$(document).ready(function () {
    // Khởi tạo Feather Icons
    feather.replace();

    $('.card-header-action').click(function () {
        // Kiểm tra icon hiện tại và thay đổi nó
        var zoom_out = $(this).find('.zoom-out');
        var zoom_in = $(this).find('.zoom-in');
        if (zoom_out.hasClass('hid')) {
            zoom_out.removeClass('hid');
            zoom_in.addClass('hid');
        } else {
            zoom_out.addClass('hid');
            zoom_in.removeClass('hid');
        }
    });
});



$(document).ready(function () {
    const listSection = $('.list-section');
    const listContainer = $('.list');
    const fileSelector = $('.file-selector');
    const fileSelectorInput = $('.file-selector-input');

    // Kích hoạt lựa chọn file khi nhấn vào button
    fileSelector.on('click', function (e) {
        e.preventDefault();
        fileSelectorInput.click();
    });

    // Xử lý sự kiện thay đổi input file (lựa chọn mới hoặc kéo và thả)
    fileSelectorInput.on('change', function (e) {
        handleFiles(e.target.files);
    });

    // Xử lý sự kiện kéo và thả
    $('.drop-section').on('dragover', function (e) {
        e.preventDefault();
    }).on('drop', function (e) {
        e.preventDefault();
        handleFiles(e.originalEvent.dataTransfer.files);
    });

    // Xử lý danh sách các file được chọn hoặc thả vào
    function handleFiles(files) {
        Array.from(files).forEach(file => {
            if (typeValidation(file.type)) {
                const li = createListItem(file);
                listContainer.prepend(li); // Thêm vào đầu danh sách
                simulateUpload(li, file); // Mô phỏng quá trình tải lên
            }
        });
    }

    // Tạo một mục li trong danh sách dựa trên file
    function createListItem(file) {
        const iconName = iconSelector(file.type);
        const li = $('<li>').addClass('in-prog').html(`
            <div class="col">
                <img src="/../../images/icons/${iconSelector(file.type)}" alt="">
            </div>
            <div class="col">
                <div class="file-name">
                    <div class="name text-truncate d-none d-sm-flex">${file.name}</div>
                    <span>0%</span>
                </div>
                <div class="file-progress d-block align-content-end">
                    <span></span>
                </div>
                <div class="file-size">${(file.size/(1024*1024)).toFixed(2)} MB</div>
            </div>
            <div class="col col-btn align-content-center mr-2 d-none">
                <button class="btn btn-danger btn-sm rounded-2 cancel-upload" type="button"><i class="fa fa-trash"></i></button>
            </div>
        `);

        // Thêm sự kiện cho nút hủy tải lên
        li.find('.cancel-upload').on('click', function () {
            li.remove();
        });

        return li;
    }

    // Mô phỏng quá trình tải lên
    function simulateUpload(li, file) {
        listSection.show();
        const progressSpan = li.find('.file-progress span');
        let progress = 0;

        const interval = setInterval(() => {
            progress += 10;
            if (progress <= 100) {
                li.find('.file-name span').text(progress + '%');
                progressSpan.css('width', progress + '%');
            } else {
                clearInterval(interval);
                li.removeClass('in-prog').addClass('complete pr-2');
                li.find('.col-btn').removeClass('d-none');
            }
        }, 100);
    }

    // Chọn icon dựa vào loại file
    function iconSelector(type) {
        return type.startsWith('image/') ? 'image.png' : 'file.png';
    }

    // Kiểm tra loại file
    function typeValidation(type) {
        return type.startsWith('image/');
    }
});

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