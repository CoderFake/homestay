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

$("html").addClass('js');

var fileInput  = $(".input-file"),  
    button     = $(".input-file-trigger"),
    the_return = $(".file-return");
      
button.on("keydown", function(event) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.on("click", function(event) {
    fileInput.focus();
    return false;
});  
fileInput.on("change", function(event) {  
    the_return.html($(this).val());  
});  
