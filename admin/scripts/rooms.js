
        let add_room_form = document.getElementById('add_room_form');
        add_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_rooms();
        });
//AJAX là một kỹ thuật trong lập trình web cho phép tương tác với máy chủ web mà không cần tải lại trang web. 
//AJAX cho phép tải một phần của trang web và cập nhật nó mà không gây ra sự gián đoạn cho trải nghiệm của người dùng
        //thêm phòng
        function add_rooms() {//lấy dữ liệu từ html
            let data = new FormData();
            data.append('add_room', '');//gọi tới hàm addroom bên file rooms ở ajax
            data.append('name', add_room_form.elements['name'].value);//các thuộc tính của room
            data.append('area', add_room_form.elements['area'].value);
            data.append('price', add_room_form.elements['price'].value);
            data.append('adult', add_room_form.elements['adult'].value);
            data.append('children', add_room_form.elements['children'].value);
            data.append('desc', add_room_form.elements['desc'].value);
            let xhr = new XMLHttpRequest();//gửi yêu cầu AJAX đến server.
            xhr.open("POST", "ajax/rooms.php", true);
            //gọi tới hàm room ở bên ajax để đồng bộ ttin
            xhr.onload = function() {//nếu mà cái hàm xhr chạy thì vào trong này
                var myModal = document.getElementById('add-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();//ẩn cái modal đi
                if (this.responseText == 1) {
                    alert('success', 'new room addes');
                    //thông báo của javascript 'thêm phòng thành công'
                    add_room_form.reset();//reset hết dữ liệu trong cái form modal
                    get_all_rooms();//gọi hàm lấy tất cả các phòng để load lại trang 
                    reset_web();//reset web giữ nguyên session
                } else {
                    alert('error', 'new room addes');
                    //hàm thông báo của javascript 'thêm phòng k thành công'            
                }
            }
            xhr.send(data);
            //hàm xhr chuyển data đấy cho php bên file rooms ajax xử lý
        }

        //lấy dữ liệu tất cả các phòng
        function get_all_rooms() {//hàm gọi tất cả dữ liệu
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);//gọi tới rooms bên file ajax
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //chỉ định kiểu dữ liệu truyền lên server là application/x-www-form-urlencoded
            xhr.onload = function() {// nhận kết quả trả về từ server. 
                document.getElementById('room-data').innerHTML = this.responseText;
                //gọi vào id room data để chuyển dữ liệu vào đấy bên file rooms.php ở thư mục admin chính
                //gán nội dung HTML trả về cho phần tử có ID là "room-data".
            }
            xhr.send('get_all_rooms');//gửi dữ liệu
        }

        // hàm chuyển đổi trạng thái phòng từ hoạt động sang không hoạt động và ngược lại
        function toggle_status(id, val) {
        //id : id phòng
        //val:trạng thái mới của phòng
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);//gọi tới hàm rooms bên folder ajax
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
            //đoạn này giống phần get all room
                if (this.responseText == 1) {
                    alert('success', 'okok');
                    get_all_rooms();
//nếu mà chạy thành công thì gọi hàm get all room để reload lại danh sách phòng đang hiển thị trên trang web
                } else {
                    alert('fail', 'loi sever');
                }
            }
            xhr.send('toggle_status=' + id + '&value=' + val);

        }
        let edit_room_form = document.getElementById('edit_room_form');
//khởi tạo biến edit room form để lấy dữ liệu từ id edit_room_form (lấy dữ liệu từ html sang)
//Biến edit_room_form là một biến tham chiếu đến một biểu mẫu HTML có ID là edit_room_form.
 
        //hàm chỉnh sửa chi tiết nhận vào giá trị id của sản phẩm
        function edit_detail(id){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);//gọi tới hàm rooms bên folder ajax
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                let data =JSON.parse(this.responseText);
//Sau khi nhận được phản hồi từ máy chủ, phản hồi được giải mã từ định dạng JSON và 
//sau đó thông tin phòng được trích xuất từ đó. 
//Thông tin phòng được điền vào các trường biểu mẫu edit_room_form để cho phép người dùng chỉnh sửa.
                edit_room_form.elements['name'].value = data.roomdata.name;
//lấy ra các dữ liêu name, area, price để chuyền sang rooms bên ajax để thực hiện update lại thông tin phòng
                edit_room_form.elements['area'].value = data.roomdata.area;
                edit_room_form.elements['price'].value = data.roomdata.price;
                edit_room_form.elements['adult'].value = data.roomdata.adult;
                edit_room_form.elements['children'].value = data.roomdata.children;
                edit_room_form.elements['desc'].value = data.roomdata.description;
                edit_room_form.elements['room_id'].value = data.roomdata.id;
            }
            xhr.send('get_room='+id);
        }
        edit_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            submit_edit_rooms();
//Khi người dùng gửi biểu mẫu bằng cách nhấn nút "Lưu", 
//gọi hàm submit_edit_rooms() để xử lý các thay đổi được thực hiện trên biểu mẫu 
//và gửi chúng đến máy chủ để cập nhật thông tin phòng.
        });

        //hàm lấy dữ liệu từ form modal ra để chỉnh sữa thông tin phòng
        function submit_edit_rooms(){
            let data = new FormData();//tạo đối tượng FormData để gửi yêu cầu tới máy chủ.
            data.append('edit_room', '');
            data.append('room_id', edit_room_form.elements['room_id'].value);//lay dữ liệu từ form html ra và gán vào biến edit_room_form 
            data.append('name', edit_room_form.elements['name'].value);
            data.append('area', edit_room_form.elements['area'].value);
            data.append('price', edit_room_form.elements['price'].value);
            data.append('adult', edit_room_form.elements['adult'].value);
            data.append('children', edit_room_form.elements['children'].value);
            data.append('desc', edit_room_form.elements['desc'].value);
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.onload = function() {
                var myModal = document.getElementById('edit-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if (this.responseText == 1) {
                    alert('success', 'EDITED');
                    add_room_form.reset();
                    get_all_rooms();
                    reset_web();
//kiểm tra phản hồi có thành công hay không, nếu thành công thì sẽ hiển thị một thông báo alert() 
//và gọi hàm reset_web() và get_all_rooms() để cập nhật lại trang web. 
                } else {
                    alert('error', 'server Down');//Nếu không thành công, nó sẽ hiển thị một thông báo lỗi.                 
                }
            }
            xhr.send(data);
        }
        let add_image_form = document.getElementById('add_image_form');
        add_image_form.addEventListener('submit',function(e){
            e.preventDefault();
            add_image();
//Hàm add_image_form sau đó được thêm vào để xử lý việc gửi yêu cầu 
//tải lên hình ảnh cho phòng với ID được lấy từ biểu mẫu edit_room_form khi nút submit được nhấn. 
//Hàm này sử dụng hàm add_image() để thực hiện việc này.
        });

       //hàm tải lên hình ảnh mới cho phòng.
        function add_image(){
            let data = new FormData();
            data.append('image',add_image_form.elements['image'].files[0]);
            data.append('room_id',add_image_form.elements['room_id'].value);
            data.append('add_image','');
            
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function(){
                if(this.responseText == 'inv_img'){
                    alert('error','only JPG, WEBP, PNG, co the su dung','image-alert');
//thông báo lỗi :chỉ các tệp ảnh có định dạng JPG, WEBP hoặc PNG mới được chấp nhận để tải lên
                }
                else if(this.responseText == 'inv_size'){
                    alert('error','Image should be less than 2MB','image-alert');
//thông báo lỗi: tệp ảnh phải nhỏ hơn 2MB. 
                }
                else if(this.responseText == 'upd_failed'){
                    alert('error','Image uploadfail thu lai sau','image-alert');
//thông báo lỗi:tải lên hình ảnh mới đã thất bại và họ nên thử lại sau
                }
                else{
                    alert('success','NEW Image added','image-alert');
                    room_images(add_image_form.elements['room_id'].value,document.querySelector("#room-images .modal-title").innerText);
//thông báo thành công và gọi hàm room_images() để cập nhật lại danh sách hình ảnh phòng.
                    add_image_form.reset();
//hàm gọi reset() để làm sạch biểu mẫu add_image_form để người dùng có thể tải lên hình ảnh khác nếu cần thiết.
                }
            }
            xhr.send(data);
        }

        //hàm  lấy danh sách hình ảnh cho một phòng được chỉ định bằng ID phòng
        function room_images(id,rname){
            document.querySelector("#room-images .modal-title").innerText = rname;
            add_image_form.elements['room_id'].value = id;
            add_image_form.elements['image'].value = '';

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('room-image-data').innerHTML= this.responseText;
//onload cập nhật danh sách hình ảnh trong phòng bằng cách 
//thay đổi nội dung của phần tử có ID room-image-data thành nội dung của phản hồi.
            }
            xhr.send('get_room_images='+id);
//cập nhật tiêu đề của hộp thoại #room-images để hiển thị tên của phòng được chỉ định,
// đặt lại giá trị của trường room_id trong biểu mẫu add_image_form 
//và xóa giá trị của trường image trong biểu mẫu add_image_form. 
//Điều này cho phép người dùng chọn hình ảnh khác để tải lên nếu cần thiết.
        }

        //hàm xóa hình ảnh của phòng
        //hàm này sẽ chuyển vào 2 giá trị là id của hình ảnh và id của phòng có hình ảnh cần xóa
        function rem_image(img_id,room_id){
            let data = new FormData();
            data.append('image_id',img_id);
            data.append('room_id',room_id);
            data.append('rem_image','');
            
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function(){
                if(this.responseText == 1){
                    alert('success','success','image-alert');
                    room_images(room_id,document.querySelector("#room-images .modal-title").innerText);
                    add_image_form.reset();
// giá trị phản hồi là 1 (được trả về từ rooms.php khi xóa hình ảnh thành công),
// một cửa sổ pop-up thành công được hiển thị bằng alert() 
//và danh sách hình ảnh của phòng được cập nhật bằng cách gọi lại hàm room_images() với room_id tương ứng. 
                }
                else{
                    alert('errorr','...','image-alert');
                }
//Nếu phản hồi không phải là 1, một cửa sổ pop-up lỗi sẽ hiển thị.
            }
            xhr.send(data);
        }

        //hàm xóa phòng với giá trị chuyển vào là room_id
        //khi được gọi nó sẽ chuyển giá trị remove trong class room về 1 (mặc định khi tạo phòng giá trị này =0)
        function remove_room(room_id){
            if(confirm("Are you sure, you want to delete this room")){
                let data = new FormData();
                data.append('room_id',room_id);
                data.append('remove_room','');
                let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.onload = function(){
                if(this.responseText == 1){
                    alert('success','Room Remove');
                    get_all_rooms();
                }
//hàm onload được gọi khi phản hồi từ máy chủ được nhận. 
//Nếu phản hồi có giá trị là 1, thì một cửa sổ thông báo với nội dung "success, Room Remove" sẽ được hiển thị 
//và hàm get_all_rooms() được gọi để cập nhật lại danh sách phòng
                else{
                    alert('errorr','rooomm');
                }
//Nếu phản hồi không thành công, một cửa sổ thông báo với nội dung "errorr, rooomm" sẽ được hiển thị.
            }
            alert('success','Room Remove');

            xhr.send(data);
//hàm send() được gọi để gửi đối tượng FormData lên máy chủ.
            };   
        }

//hàm chuyển thuộc tính thumb của hình ảnh thành giá trị 1(mặc định khi thêm hình ảnh giá trị này =0)
//nếu hình ảnh có giá trị thumb =1 thì sẽ hiển thị lên trang chủ
        function thumb_image(img_id,room_id){
            let data = new FormData();
            data.append('image_id',img_id);
            data.append('room_id',room_id);
            data.append('thumb_image','');
            
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function(){
                if(this.responseText == 1){
                    alert('success','success','image-alert');
                    room_images(room_id,document.querySelector("#room-images .modal-title").innerText);
//Hàm room_images() được gọi để cập nhật lại danh sách ảnh của phòng
                    add_image_form.reset();
                    //form thêm ảnh được xóa

                }
                else{
                    alert('errorr','...','image-alert');
                }
//Nếu phản hồi không thành công, một cửa sổ thông báo với nội dung "errorr" 
//và một lớp image-alert sẽ được thêm vào để hiển thị thông báo.
            }
            xhr.send(data);
            //hàm send() được gọi để gửi đối tượng FormData lên máy chủ.
        }

window.onload = function() {
    //mỗi khi f5 lại trang thì hàm này sẽ được gọi với mục đích reset lại dữ liệu của phòng 
    //ví dụ nếu thêm mới 1 phòng vào thì dữ liệu sẽ chưa được đổ về trang web hiển thị
    //nên ta cần phải gọi hàm này ở mỗi cuối của hàm nhằm lấy lại toàn bộ dữ liệu vừa thêm mới
    get_all_rooms();
}
function reset_web(){//hàm reload trang web mà không xóa session đăng nhập admin
    location.reload();
}
    

//Một đối tượng FormData được tạo ra và thêm ... và một chuỗi ... vào nó. 
//Sau đó, một đối tượng XMLHttpRequest được tạo ra 
//và mở kết nối tới ajax/rooms.php thông qua phương thức POST.