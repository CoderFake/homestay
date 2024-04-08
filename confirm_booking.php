<?php
require('inc/header.php');
require('admin/inc/db_config.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="javasocorip/windy.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Tre Homestay</title>
</head>
 <!--đọc từ đây nhé -->
  <!--đầu tiên khi mà đã ấn vào trang web này í thì tức là web này nó sẽ hiển thị lên và đi kèm với nó sẽ là một cái thuộc tính id của room -->
   <!--cái thuộc tính id này được đi kèm với trang web này nên mình lấy ra sử dụng để lấy toàn bộ dữ liệu của room ra -->
    <!--tiếp theo mà mình khởi tạo session rooom và mình chuyền các giá trị của cái room mà mình đang book này vào cái session đấy -->
     <!--cuối cùng là mình lấy các cái session đấy ra để lưu vào trong cái thông tin đặt phòng -->
<body>
    <section class="product">
            <?php
            // đoạn này là kiểm tra xem nếu mà nó không lấy được cái id của phòng thì mình sẽ cho nó về lại trang chủ
                 if(!isset($_GET['id'])){
                     redirect('index.php');
                //đoạn này sẽ là kiểm tra xem có cái sesion login không
                //tại vì nếu mà đăng nhập vào thì mình sẽ để cái session login == true để có thể vào các web này
                //web đặt phòng này cần phải có login ==true thì mới cho vào (tức là phải đăng nhập vào thì mới được book phòng)
                 } else if(!(isset($_SESSION['login']) && $_SESSION['login'] == true)){
                    redirect('index.php');

                 }

                 //filter and get user data
            
                $data = filteration($_GET);//cái hàm get này tức là nó lấy dữ liệu id của phòng khi mà người dùng ấn vào nút đặt phòng í
                //cái id của phòng nó sẽ được gắn vào đấy và đi kèm sang tới bên trang web này
                //đoạn này lấy toàn bô
                $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=?  AND  `removed`=?",[$data['id'],1,0],'iii');
                 //dùng cái id đấy để lấy thông tin phòng ra
                  if(mysqli_num_rows($room_res)==0){
                      redirect('index.php');
                  }
                $room_data = mysqli_fetch_assoc($room_res);
                

                $_SESSION['room'] =[
                    "id" => $room_data['id'],
                    "name" => $room_data['name'],
                    "price" => $room_data['price'],
                    "payment" => null,
                    "available" => false,
                ];
                //mình khởi tạo các giá trị session của room với id thì bằng 
                echo $_SESSION['uId'];
                //đây chính là cái session uId mà mình tạo ra khi mà user đăng nhập vào
                //mình sẽ dùng cái session uID này để lấy ra toàn bộ thông tin của người đăng nhập
                //từ đó dùng để điền vào form booking 
                $u_Res = select("SELECT * FROM `user_cred` WHERE `id`=? ",[$_SESSION['uId']],'i');

                $userdata = mysqli_fetch_assoc($u_Res);





            ?>
        <div class="grid-2">
            <div class="img-group item-l">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 600px;">
                    <div class="carousel-inner" >
                        <?php
                            //hàm lấy dữ liệu hình ảnh của cái phòng bằng cách truyền cáo id của cái phòng vào câu lệnh sql để lấy dữ liệu từ database ra
                            $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                            $thumb_q = mysqli_query($con,"SELECT * FROM `room_images`  WHERE `room_id`='$room_data[id]' AND `thumb`='1'");
            
                            if(mysqli_num_rows($thumb_q)>0){
                                $thumb_res = mysqli_fetch_assoc($thumb_q);
                                $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                            }//phía dưới này mình cho hiển thị thêm tên với giá tiền
                            echo<<<data
                                <div class="card p-3 shadow-sm rounded">
                                <img src='$room_thumb'>
                                <h5 class="display-3">$room_data[name]</h5>
                                <h6 class="display-4">$room_data[price] VNĐ</h6>
                                </div>

                data;   ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <?php ?>
            <div class="item-r">
            
                <div style="font-size: 30px; margin-bottom: 10px; font-weight: 600;">CONFRIM BOOKING</div>
                <div class="under-name">
                    <span style="margin-right:5px ;">4.9</span>
                    <i class="fa-solid fa-star" style="color: #f2cb07;"></i>
                    <i class="fa-solid fa-star" style="color: #f2cb07;"></i>
                    <i class="fa-solid fa-star" style="color: #f2cb07;"></i>
                    <i class="fa-solid fa-star" style="color: #f2cb07;"></i>
                    <i class="fa-solid fa-star" style="color: #f2cb07;"></i>
                </div>

                <!--php code -->
                <form action="pay_now.php" method="post" id="booking_form">
                    <h6 class="mb-2"> BOOKING DETAILS</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Name</label>
                                 <!--kéo lên trên sẽ thấy mình đã gán cái biến $userdata này bằng cái hàm lấy dữ liệu của user ra bằng session uId  -->
                                <input type="name" class="form-control" value="<?php echo $userdata['name'] ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"> Phone Number</label>
                                <input type="number" class="form-control" value="<?php echo $userdata['phone'] ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">CHECKIN</label>
                                <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-none"  required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">CHECKOUT</label>
                                <input name="checkout" onchange="check_availability()" type="date" class="form-control shadow-none"  required>
                            </div>
                            <div class="col-12">
                                <div class="spinner-border text-warning mb-3 d-none" id="info_loader" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <h6 class="mb-3 text-danger" id="pay_info">Provide check-in & check-out data !</h6>
                                <button name="pay_now" class="btn w-100 text-dark custom-bg shadow-none" disabled>PAY NOW</button>
                            </div>


                        </div>
                </form>
                <div class="des">
                    <div class="ico">
                        <i class="fa-solid fa-brush" style="color: rgb(146, 146, 232);"></i>
                    </div>
                    <div class="infor">
                    <?php
                        $login=0;
                        if(isset($_SESSION['login']) && $_SESSION['login']==true){
                            $login=1;
                        }
                        echo<<<book
                        
                        <button onclick='checkLoginToBook($login,$room_data[id])' class='btn ' > BOOK NOW</button>
                        
                        book;

                    ?>
                    
                    </div>
                </div>
                    
            </div> 
    </section>
    <script>
        let booking_form = document.getElementById('booking_form');
        //các biến cùng tên này sẽ lấy dữ liệu từ trong các cái form trong dấu'' 
        //các cái id này ở phía trên kia 
        let info_loader = document.getElementById('info_loader');
        let pay_info = document.getElementById('pay_info');
        //hàm này chính là hàm kiếm tra xem là cái thằng đặt phòng nó có nhập chuẩn thông tin check in check out không
        // nếu mà chuẩn thì mình mới cho nó đặt phòng
        function check_availability(){
            let checkin_val =booking_form.elements['checkin'].value;
            //gán các biến checkin_val với checkout_val để còn xử lý code been dưới để kiếm tra
            let checkout_val =booking_form.elements['checkout'].value;

            //đầu tiên mình sẽ khóa cái form này lại bằng thuộc tính disabled thì nó sẽ không thể ấn vào cái nút paynow để đặt được
            //bởi vì khi mà ấn vào nút paynow thì tất cả dữ liệu sẽ chuyển hết về database nên phải điền đủ thông tin mình mới cho nó ấn vào nút này
            booking_form.elements['pay_now'].setAttribute('disabled',true);
            if(checkin_val !='' && checkout_val!=''){

                pay_info.classList.add('d-none');
                pay_info.classList.replace('text-dark','text-danger');

                info_loader.classList.remove('d-none');

                let data = new FormData();
                //gọi tới hàm check_avaibility bên trong folder ajax / confirm_booking để thực hiện xử lý logic các thông tin check in check out
                data.append('check_availability','');
                data.append('check_in',checkin_val);
                data.append('check_out',checkout_val);//chuyển các dữ liệu này sang bên confirm booking bên ajax

                let xhr = new XMLHttpRequest();
                xhr.open("POST","ajax/confirm_booking.php",true);

                xhr.onload = function()
                {
                    let data = JSON.parse(this.responseText);
                    if(data.status == 'check_in_out_equal'){//đây là các lỗi nếu mà nhập vào sai ngày check in check out
                        pay_info.innerText = "You Cannot Check OUT on the same day";
                    }
                    else if(data.status == 'check_out_earlier'){
                        pay_info.innerText = "Check out date is earlier than check in date";
                    }else if(data.status == 'check_in_earlier'){
                        pay_info.innerText = "Check in date is earlier than today  date";
                    }
                    else if(data.status == 'unavailable'){
                        pay_info.innerText = "Room not available for this check in date";
                    }
                    else{//nếu mà nhập đúng thì mình sẽ cho nó hiển thị ra giái triền mình cần thanh tôans
                        pay_info.innerHTML = "No. of Days: "+data.days+"<br>Total Amount to Pay: "+data.payment;
                        pay_info.classList.replace('text-danger','text-dark');
                        booking_form.elements['pay_now'].removeAttribute('disabled');
                        //đồng thời mình sẽ xóa đi thuộc tính disabled ở cái nút paynow để cho nó ấn vào đấy thanh toán được
                        //hiện tại chưa làm thanh toán nên mình để chỉ cần ấn nút đấy xong mọi thông tin đặt phòng sẽ chuyển về database
                        //
                    }
                    pay_info.classList.remove('d-none');
                    info_loader.classList.add('d-none');

                }
                xhr.send(data);
            }

        }



    </script>
    <!--contact section ends-->
    <!--footnote starts-->
    <div class="footerr">

        <div class="creditt">
        <h5 class="h5-room" text-align: right> GIOI THIEU</h5>
        <h5>
        <?php echo $room_data['description'];
                            
                             ?></h5>
        </div>
    </div>
    
    <section class="footer">
    
        <div class="credit">Copyright © Nhóm 11 2023 <span> | Developed by: Nhóm 11</span></div>
    </section>
    
    <script>
        
        const element = document.querySelectorAll('.input-date');
        element[0].valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;
        element[1].valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;

        document.querySelector('#search-btn').onclick = () => {
            searchForm.classList.toggle('active');
        }
        const base=document.querySelector('.base')
        const small=document.querySelectorAll('.small')
        small.forEach(item=>{
            item.addEventListener('mouseover',()=>{
                base.src=item.src
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    
</body>

</html>