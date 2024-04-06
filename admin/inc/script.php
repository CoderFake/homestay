<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>//tạo ra hai hàm alert() và remAlert() để tạo và xóa thông báo cảnh báo cho người dùng.
   function alert(type,msg){
//Hàm alert() lấy hai tham số đầu vào là type và msg, trong đó type đại diện cho kiểu thông báo (thành công hoặc lỗi) và 
//msg là nội dung thông báo.
    let bs_class = (type == 'success') ? 'alert-success':'alert-danger';
    let element = document.createElement('div');
    //Hàm này sử dụng class bootstrap để tạo ra một div alert thông báo tương ứng với type và msg
    element.innerHTML = `
            <div class="alert ${bs_class}  alert-dismissible fade show custom-alert" role="alert">
             <strong class="me-3">${msg}</strong>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    `;
    document.body.append(element);//hàm append() được sử dụng để thêm div vào cuối của thẻ body của trang web.
   } 
   function remAlert(){
        document.getElementsByClassName('alert')[0].remove();
   }
//Hàm remAlert() được sử dụng để xóa bỏ div alert đầu tiên trong trang web. 
//Nếu không có alert nào tồn tại, hàm sẽ không thực hiện bất kỳ hành động nào.
</script>