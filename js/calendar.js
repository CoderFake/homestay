$(document).ready(function() {
    const header = $(".calendar h3");
    const dates = $(".dates");
    const navs = $("#prev, #next");

    const months = [
        "Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu",
        "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"
    ];

    let date = new Date();
    let month = date.getMonth();
    let year = date.getFullYear();

    function renderCalendar() {
        const start = new Date(year, month, 1).getDay();
        const endDate = new Date(year, month + 1, 0).getDate();
        const endDatePrev = new Date(year, month, 0).getDate();

        let datesHtml = "";
        for (let i = (start === 0 ? 6 : start - 1); i > 0; i--) {
            datesHtml += `<li class="inactive">${endDatePrev - i + 1}</li>`;
        }

        for (let i = 1; i <= endDate; i++) {
            let className = (i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) ? ' class="today"' : "";
            datesHtml += `<li${className}>${i}</li>`;
        }

        const end = new Date(year, month, endDate).getDay();
        for (let i = end; i < 6; i++) {
            datesHtml += `<li class="inactive">${i - (end === 0 ? 6 : end - 1) + 1}</li>`;
        }

        dates.html(datesHtml);
        header.text(`${months[month]} ${year}`);
    }

    navs.on("click", function() {
        month = (this.id === "next") ? (month + 1) % 12 : (month === 0 ? 11 : month - 1);
        year = (this.id === "next" && month === 0) ? year + 1 : (this.id === "prev" && month === 11) ? year - 1 : year;

        date = new Date(year, month, new Date().getDate());
        renderCalendar();
    });

    renderCalendar();
});
