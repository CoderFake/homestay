<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đặt Phòng Homestay</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/css/calendar.css">
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/i18n/jquery-ui-i18n.min.js"></script>
</head>

<body>
    <div class="date-picker-container">
        <div class="date-picker">
            <label for="check-in">Ngày nhận phòng:</label>
            <input type="text" id="check-in" name="check-in">
        </div>
        <div class="date-picker">
            <label for="check-out">Ngày trả phòng:</label>
            <input type="text" id="check-out" name="check-out">
        </div>
    </div>


    <script>
        $(function () {
            $.datepicker.regional["vi-VN"] =
            {
                closeText: "Đóng",
                prevText: "Trước",
                nextText: "Sau",
                currentText: "Hôm nay",
                monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
                monthNamesShort: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
                dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
                dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
                dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                weekHeader: "Tuần",
                dateFormat: "dd/mm/yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""
            };

            $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
            var dateFormat = "dd/mm/yy",
                from = $("#check-in").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2, // Hiển thị 2 tháng cùng lúc
                    minDate: new Date(),
                    dateFormat: dateFormat,
                    onClose: function (selectedDate) {
                        // Khi một ngày được chọn từ datepicker `check-in`, cập nhật ngày tối thiểu cho `check-out`
                        $("#check-out").datepicker("option", "minDate", selectedDate);
                        $("#check-out").datepicker("show"); // Tự động hiển thị datepicker cho `check-out`
                    }
                }),
                to = $("#check-out").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2, // Hiển thị 2 tháng cùng lúc
                    minDate: new Date(),
                    dateFormat: dateFormat,
                    onClose: function (selectedDate) {
                        // Khi một ngày được chọn từ datepicker `check-out`, cập nhật ngày tối đa cho `check-in`
                        $("#check-in").datepicker("option", "maxDate", selectedDate);
                    }
                });

            // Tùy chỉnh để khi click vào `check-out` cũng hiển thị cả hai datepicker
            $("#check-in, #check-out").on("focus", function () {
                $(".ui-datepicker").css({ // Điều chỉnh CSS cho datepicker nếu cần
                    "display": "flex",
                    "flex-wrap": "wrap"
                });
            });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }
                return date;
            }
        });
    </script>
</body>

</html>