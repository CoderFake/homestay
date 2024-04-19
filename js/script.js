// $(document).ready(function() {
//     const listSection = $('.list-section');
//     const listContainer = $('.list');
//     const fileSelector = $('.file-selector');
//     const fileSelectorInput = $('.file-selector-input');

//     // Upload files with browse button
//     fileSelector.on('click', function() {
//         fileSelectorInput.click();
//     });

//     fileSelectorInput.on('change', function() {
//         Array.from(fileSelectorInput[0].files).forEach(file => {
//             if (typeValidation(file.type)) {
//                 uploadFile(file);
//             }
//         });
//     });

//     // Drag over
//     $('.drop-section').on('dragover', function(e) {
//         e.preventDefault();
//         // Add some visual cue to indicate the drag over effect
//     });

//     // Drag leave
//     $('.drop-section').on('dragleave', function() {
//         // Remove visual cue
//     });

//     // File drop
//     $('.drop-section').on('drop', function(e) {
//         e.preventDefault();
//         Array.from(e.originalEvent.dataTransfer.files).forEach(file => {
//             if (typeValidation(file.type)) {
//                 uploadFile(file);
//             }
//         });
//     });

//     // Check the file type
//     function typeValidation(type) {
//         return type.startsWith('image/');
//     }

//     // Upload file function
//     function uploadFile(file) {
//         listSection.show();
//         var li = $('<li>').addClass('in-prog');
//         var iconName = iconSelector(file.type);
//         li.html(`
//             <div class="col">
//                 <img src="/images/icons/${iconName}" alt="">
//             </div>
//             <div class="col">
//                 <div class="file-name">
//                     <div class="name">${file.name}</div>
//                     <span>0%</span>
//                 </div>
//                 <div class="file-progress">
//                     <span></span>
//                 </div>
//                 <div class="file-size">${(file.size / (1024 * 1024)).toFixed(2)} MB</div>
//             </div>
//             <div class="col d-flex justify-content-center align-items-center">
//                 <button class="btn btn-danger btn-sm rounded-2 cancel-upload" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
//             </div>
//         `);

//         listContainer.prepend(li);

//         // Simulate upload process
//         setTimeout(() => {
//             li.removeClass('in-prog').addClass('complete');
//             li.find('.file-name span').text('100%');
//             li.find('.file-progress span').css('width', '100%');
//         }, 1000); // Simulate upload delay

//         li.find('.cancel-upload').on('click', function() {
//             li.remove();
//         });
//     }

//     // Find icon for file based on type
//     function iconSelector(type) {
//         if (type.startsWith('image/')) {
//             return 'image.png'; // Simplified for demo purposes
//         }
//         return 'image.png';
//     }
// });

// $("html").addClass('js');
$(document).ready(function () {
    $('.input-file').on('change', function () {
        var file = this.files[0];
        var fileType = file.type;
        var fileSize = file.size;

        // Lấy id của thẻ img để cập nhật src
        var imagePreview = $('#profile-pic');

        // Kiểm tra loại tệp và kích thước
        if (fileType === 'image/jpeg' || fileType === 'image/png' || fileType === 'image/webp') {
            if (fileSize <= 2097152) { // 2MB
                // Đọc và hiển thị tệp ảnh
                var reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                createToast('error', 'File quá lớn, vui lòng chọn file nhỏ hơn 2MB.');
                $(this).val('');
                imagePreview.attr('src', '/images/user_default.png'); // Trả lại ảnh mặc định nếu file quá lớn
            }
        } else {
            createToast('error', 'Chỉ chấp nhận file ảnh định dạng JPG, PNG hoặc WebP.')
            $(this).val('');
            imagePreview.attr('src', '/images/user_default.png'); // Trả lại ảnh mặc định nếu định dạng không đúng
        }
    });

    $('.input-file-trigger').click(function (event) {
        event.preventDefault();
        $(this).siblings('.input-file').click();
    });
});


$(document).ready(function () {
    $("#old-password, #new-password, #acpt-password").on("input", function () {
        if ($("#new-password").val() === $("#acpt-password").val()) {
            $("#acpt-password").removeClass("is-invalid");
            $("#acpt-password").addClass("is-valid");
        } else {
            $("#acpt-password").removeClass("is-valid");
            $("#acpt-password").addClass("is-invalid");
        }
    });
});