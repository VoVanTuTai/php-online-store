// Function to format the current date
function getCurrentDate() {
    var today = new Date();
    var weekday = today.toLocaleDateString('vi-VN', { weekday: 'long' });
    var day = today.getDate();
    var month = today.toLocaleDateString('vi-VN', { month: 'long' });
    var year = today.getFullYear();

    return weekday + ', ' + day + ' ' + month + ' ' + year;
}

// Update date on page load
window.onload = function () {
    var currentDate = getCurrentDate();
    document.getElementById("dateNow").textContent = currentDate;
};




document.addEventListener('DOMContentLoaded', function () {
    var countdownElement = document.getElementById('countdown');
    var progressBar = document.querySelector('.progress-bar');

    // Lấy thời gian hiện tại
    var currentTime = new Date();

    // Thiết lập thời gian bắt đầu đếm ngược đến giờ mới
    var targetTime = new Date(currentTime);
    targetTime.setHours(currentTime.getHours() + 1, 0, 0, 0); // Thiết lập giờ mới là giờ tiếp theo, phút và giây là 0

    function updateCountdown() {
        var now = new Date();
        var timeRemaining = targetTime - now;

        if (timeRemaining <= 0) {
            progressBar.style.width = "100%";
        } else {
            // Tính toán số giờ, phút, giây còn lại
            var hours = Math.floor(timeRemaining / (1000 * 60 * 60));
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            // Hiển thị đồng hồ đếm ngược
            // countdownElement.textContent = `Thời gian: ${hours} giờ ${minutes} phút ${seconds} giây` +`<i class="fa-solid fa-bolt"></i>`;
            countdownElement.innerHTML = `<i class="fas fa-bolt"></i> Thời gian: ${hours} giờ ${minutes} phút ${seconds} giây `;


            // Tính toán % tiến độ
            var progress = (timeRemaining / (60 * 60 * 1000)) * 100; // Tính theo giờ
            progressBar.style.width = `${100 - progress}%`;
        }
    }

    // Gọi hàm updateCountdown ban đầu
    updateCountdown();

    // Cập nhật đồng hồ đếm ngược mỗi giây
    setInterval(updateCountdown, 1000);
});


var itemsPerPage = 9;
var productList = [

    // mũ 3/4 đầu
    {
        name: "Mũ 3/4 - Mẫu 1",
        image: "../images/mbh_34/mu34_01.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, phù hợp cho các dòng xe cổ điển và cruiser.",
        price: 500000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 841g ± 50g",
            "- Size XL: 57 - 59cm",
            "- Size L: 56 - 57cm",
            "- Size M: 55 - 56cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 2",
        image: "../images/mbh_34/mu34_02.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, thiết kế thời trang, chất lượng cao.",
        price: 520000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 900g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 3",
        image: "../images/mbh_34/mu34_03.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, màu sắc tươi sáng, bảo vệ an toàn khi đi xe.",
        price: 490000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 850g ± 50g",
            "- Size XL: 57 - 59cm",
            "- Size L: 55 - 57cm",
            "- Size M: 53 - 55cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 4",
        image: "../images/mbh_34/mu34_04.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, phong cách đơn giản nhưng hiện đại.",
        price: 480000,
        discountPercent: 30,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 880g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 5",
        image: "../images/mbh_34/mu34_05.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, chất liệu nhẹ và thoáng mát.",
        price: 510000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 900g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 6",
        image: "../images/mbh_34/mu34_06.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, có nhiều màu sắc và kích thước phù hợp.",
        price: 530000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 850g ± 50g",
            "- Size XL: 57 - 59cm",
            "- Size L: 55 - 57cm",
            "- Size M: 53 - 55cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 7",
        image: "../images/mbh_34/mu34_07.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, kiểu dáng độc đáo và thời trang.",
        price: 490000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 860g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 8",
        image: "../images/mbh_34/mu34_08.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, chất liệu chống nắng và chống thấm mồ hôi.",
        price: 540000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 920g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ 3/4 - Mẫu 9",
        image: "../images/mbh_34/mu34_09.jpg",
        category: "Mũ 3/4",
        description: "Mũ bảo hiểm loại 3/4 đầu, đa dạng về kiểu dáng và màu sắc.",
        price: 520000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 880g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },

    // mũ fullface
    {
        name: "Mũ Fullface - Mẫu 1",
        image: "../images/mbh_fullface/full01.jpg",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface chất lượng cao, bảo vệ toàn diện cho đầu.",
        price: 800000,
        discountPercent: 30,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 900g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 2",
        image: "../images/mbh_fullface/full02.jpg",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface với thiết kế hiện đại và đẳng cấp.",
        price: 820000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 950g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 57 - 59cm",
            "- Size M: 55 - 57cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 3",
        image: "../images/mbh_fullface/full03.jpg",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface, một lựa chọn tốt cho những tay lái xe đam mê tốc độ.",
        price: 780000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 920g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 4",
        image: "../images/mbh_fullface/full04.jpg",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface với công nghệ tiên tiến, an toàn tuyệt đối.",
        price: 850000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 930g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 5",
        image: "../images/mbh_fullface/full05.jpg",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface thời trang, phong cách và độ bền cao.",
        price: 790000,
        discountPercent: 30,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 890g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 6",
        image: "../images/mbh_fullface/full06.jpg",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface với nhiều màu sắc và kiểu dáng đa dạng.",
        price: 830000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 920g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 57 - 59cm",
            "- Size M: 55 - 57cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 7",
        image: "../images/mbh_fullface/full07.png",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface dành cho những tay đua chuyên nghiệp và đam mê thể thao xe đạp.",
        price: 820000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 910g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 8",
        image: "../images/mbh_fullface/full08.png",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface cao cấp với thiết kế đẳng cấp và an toàn.",
        price: 860000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 940g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 57 - 59cm",
            "- Size M: 55 - 57cm"
        ]
    },
    {
        name: "Mũ Fullface - Mẫu 9",
        image: "../images/mbh_fullface/full09.png",
        category: "Mũ Fullface",
        description: "Mũ bảo hiểm Fullface phong cách, an toàn và thoải mái cho mọi hoạt động.",
        price: 800000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 920g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 56 - 58cm",
            "- Size M: 54 - 56cm"
        ]
    },


    {
        name: "Mũ 1/2 - Mẫu 1",
        image: "../images/mbh_12/mu12_01.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, phù hợp cho xe máy phổ thông.",
        price: 400000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 841g ± 50g",
            "- Size XL: 57 - 59cm",
            "- Size L: 56 - 58cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 2",
        image: "../images/mbh_12/mu12_02.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, thiết kế đơn giản nhưng đầy phong cách.",
        price: 420000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 860g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 57 - 59cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 3",
        image: "../images/mbh_12/mu12_03.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, chất liệu nhẹ và thoáng mát.",
        price: 430000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 880g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 58 - 60cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 4",
        image: "../images/mbh_12/mu12_04.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, có nhiều màu sắc và kích thước phù hợp.",
        price: 410000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 850g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 57 - 59cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 5",
        image: "../images/mbh_12/mu12_05.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, kiểu dáng thời trang và hiện đại.",
        price: 390000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 870g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 58 - 60cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 6",
        image: "../images/mbh_12/mu12_06.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, bền bỉ và an toàn khi sử dụng.",
        price: 420000,
        discountPercent: 30,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 880g ± 50g",
            "- Size XL: 58 - 60cm",
            "- Size L: 57 - 59cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 7",
        image: "../images/mbh_12/mu12_07.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, phù hợp cho các dòng xe phổ thông.",
        price: 400000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng fiberglass",
            "- Trọng lượng: 870g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 58 - 60cm"
        ]
    },
    {
        name: "Mũ 1/2 - Mẫu 8",
        image: "../images/mbh_12/mu12_08.png",
        category: "Mũ 1/2",
        description: "Mũ bảo hiểm loại 1/2 đầu, thiết kế thời trang và phong cách.",
        price: 410000,
        discountPercent: 55,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng polycarbonate",
            "- Trọng lượng: 860g ± 50g",
            "- Size XL: 59 - 61cm",
            "- Size L: 58 - 60cm"
        ]
    },

    // Mũ lật cầm
    {
        name: "Mũ lật cằm - Mẫu 1",
        image: "../images/mbh_latcam/latcam01.jpg",
        category: "Mũ lật cằm",
        description: "Mũ bảo hiểm lật cằm tiện dụng, thích hợp cho chạy xe phong cách.",
        price: 600000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 1237g ± 50g",
            "- Size XL: 58 - 59cm",
            "- Size L: 56 - 57cm"
        ]
    },
    {
        name: "Mũ lật cằm - Mẫu 2",
        image: "../images/mbh_latcam/latcam02.jpg",
        category: "Mũ lật cằm",
        description: "Mũ bảo hiểm lật cằm cao cấp, thiết kế thời trang và tiện dụng.",
        price: 620000,
        discountPercent: 35,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 1237g ± 50g",
            "- Size XL: 58 - 59cm",
            "- Size L: 56 - 57cm"
        ]
    },
    {
        name: "Mũ lật cằm - Mẫu 3",
        image: "../images/mbh_latcam/latcam03.jpg",
        category: "Mũ lật cằm",
        description: "Mũ bảo hiểm lật cằm chất lượng, bảo vệ an toàn cho người sử dụng.",
        price: 590000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 1237g ± 50g",
            "- Size XL: 58 - 59cm",
            "- Size L: 56 - 57cm"
        ]
    },
    {
        name: "Mũ lật cằm - Mẫu 4",
        image: "../images/mbh_latcam/latcam04.jpg",
        category: "Mũ lật cằm",
        description: "Mũ bảo hiểm lật cằm đẹp mắt, đảm bảo độ an toàn khi điều khiển xe.",
        price: 580000,
        discountPercent: 40,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 1237g ± 50g",
            "- Size XL: 58 - 59cm",
            "- Size L: 56 - 57cm"
        ]
    },
    {
        name: "Mũ lật cằm - Mẫu 5",
        image: "../images/mbh_latcam/latcam05.jpg",
        category: "Mũ lật cằm",
        description: "Mũ bảo hiểm lật cằm thời trang, phong cách và chất lượng cao.",
        price: 600000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Trọng lượng: 1237g ± 50g",
            "- Size XL: 58 - 59cm",
            "- Size L: 56 - 57cm"
        ]
    },


    {
        name: "Mũ trẻ em - Mẫu 1",
        image: "../images/mbh_treem/treem01.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm dành cho trẻ em, với các hình vẽ và màu sắc bắt mắt.",
        price: 300000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 2",
        image: "../images/mbh_treem/treem02.png",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm dành cho trẻ em, chất liệu nhẹ và an toàn.",
        price: 320000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 3",
        image: "../images/mbh_treem/treem03.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm trẻ em với nhiều họa tiết vui nhộn và bắt mắt.",
        price: 310000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 4",
        image: "../images/mbh_treem/treem04.png",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm dành cho trẻ em, thiết kế độc đáo và đáng yêu.",
        price: 300000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 5",
        image: "../images/mbh_treem/treem05.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm trẻ em với nhiều màu sắc tươi sáng và an toàn.",
        price: 330000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 6",
        image: "../images/mbh_treem/treem06.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm cho trẻ em, chất liệu mềm mại và thoải mái khi đội.",
        price: 315000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 7",
        image: "../images/mbh_treem/treem07.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm trẻ em với thiết kế bắt mắt và an toàn cho bé.",
        price: 325000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 8",
        image: "../images/mbh_treem/treem08.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm trẻ em với nhiều lựa chọn màu sắc và kiểu dáng.",
        price: 310000,
        discountPercent: 30,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },
    {
        name: "Mũ trẻ em - Mẫu 9",
        image: "../images/mbh_treem/treem09.jpg",
        category: "Mũ trẻ em",
        description: "Mũ bảo hiểm trẻ em với họa tiết đáng yêu và bảo vệ an toàn.",
        price: 300000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Thiết kế kính âm đột phá, nhiều màu sắc.",
            "- Trọng lượng: 712g ± 50g",
            "- Size S: 52 - 54cm"
        ]
    },


    // mũ xe đạp
    {
        name: "Mũ xe đạp - Mẫu 1",
        image: "../images/mbh_xedap/muxedap01.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm phù hợp cho các tín đồ đạp xe, bảo vệ an toàn khi đi xe đạp.",
        price: 250000,
        discountPercent: 0,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 2",
        image: "../images/mbh_xedap/muxedap02.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm cho người đi xe đạp, thiết kế đơn giản và nhẹ nhàng.",
        price: 260000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 3",
        image: "../images/mbh_xedap/muxedap03.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm xe đạp chất lượng cao, an toàn khi điều khiển xe.",
        price: 255000,
        discountPercent: 5,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 4",
        image: "../images/mbh_xedap/muxedap04.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm phù hợp cho các tay đua xe đạp, tăng tính thẩm mỹ và bảo vệ.",
        price: 270000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 5",
        image: "../images/mbh_xedap/muxedap05.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm xe đạp nhẹ nhàng và thoải mái, giúp bảo vệ an toàn.",
        price: 245000,
        discountPercent: 0,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 6",
        image: "../images/mbh_xedap/muxedap06.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm xe đạp với nhiều lựa chọn màu sắc và kiểu dáng.",
        price: 260000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 7",
        image: "../images/mbh_xedap/muxedap07.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm xe đạp thời trang, phong cách và an toàn.",
        price: 250000,
        discountPercent: 0,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 8",
        image: "../images/mbh_xedap/muxedap08.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm xe đạp với thiết kế hiện đại và đa dạng.",
        price: 265000,
        discountPercent: 5,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },
    {
        name: "Mũ xe đạp - Mẫu 9",
        image: "../images/mbh_xedap/muxedap09.jpg",
        category: "Mũ xe đạp",
        description: "Mũ bảo hiểm xe đạp chất lượng cao, an toàn và thời trang.",
        price: 255000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Vỏ bằng nhựa ABS nguyên sinh",
            "- Xốp EPS",
            "- Trọng lượng: 350 gram",
            "- Size: Freesize (58 - 60) - có hệ thống Roc - Lock dễ dàng tăng chỉnh vòng đầu."
        ]
    },

    // kinh mũ bao hiẻm
    {
        name: "Kính mũ bảo hiểm - Mẫu 1",
        image: "../images/mbh_kinh/kinh01.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm thời trang, bổ sung thêm phong cách khi đi xe.",
        price: 100000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Kính có màu trắng trong giúp người dùng rõ mắt khi đi trời nắng, không bị hạn chế khả năng nhìn khi đi trong đêm."
        ]
    },
    {
        name: "Kính mũ bảo hiểm - Mẫu 2",
        image: "../images/mbh_kinh/kinh02.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm với thiết kế hiện đại và đa dạng màu sắc.",
        price: 120000,
        discountPercent: 15,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Được sản xuất với công nghệ hiện đại giúp cho hình ảnh chuẩn không hại mắt, hạn chế tối đa khả năng oxi hóa nhựa do thời tiết đảm bảo cho kính giữ được độ trong trên 2 năm sử dụng."
        ]
    },
    {
        name: "Kính mũ bảo hiểm - Mẫu 3",
        image: "../images/mbh_kinh/kinh03.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm đa năng, chất liệu chắc chắn và bền bỉ.",
        price: 90000,
        discountPercent: 5,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Có tác dụng bảo vệ mắt trong điều kiện mưa gió, bụi đường, chống côn trùng."
        ]
    },
    {
        name: "Kính mũ bảo hiểm - Mẫu 4",
        image: "../images/mbh_kinh/kinh04.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm nhẹ và thoải mái, phù hợp với mọi loại mũ.",
        price: 95000,
        discountPercent: 0,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Được sản xuất với công nghệ hiện đại giúp cho hình ảnh chuẩn không hại mắt, hạn chế tối đa khả năng oxi hóa nhựa do thời tiết."
        ]
    },
    {
        name: "Kính mũ bảo hiểm - Mẫu 5",
        image: "../images/mbh_kinh/kinh05.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm thời trang, bảo vệ mắt hiệu quả khi đi xe.",
        price: 110000,
        discountPercent: 20,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Kính có màu trắng trong giúp người dùng rõ mắt khi đi trời nắng, không bị hạn chế khả năng nhìn khi đi trong đêm."
        ]
    },
    {
        name: "Kính mũ bảo hiểm - Mẫu 6",
        image: "../images/mbh_kinh/kinh06.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm đa dạng kiểu dáng, phù hợp với mọi lứa tuổi.",
        price: 105000,
        discountPercent: 10,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Được sản xuất với công nghệ hiện đại giúp cho hình ảnh chuẩn không hại mắt, hạn chế tối đa khả năng oxi hóa nhựa do thời tiết."
        ]
    },
    {
        name: "Kính mũ bảo hiểm - Mẫu 7",
        image: "../images/mbh_kinh/kinh07.jpg",
        category: "Kính mũ bảo hiểm",
        description: "Kính mũ bảo hiểm sang trọng, đem lại phong cách cá tính.",
        price: 115000,
        discountPercent: 25,
        get discountPrice() {
            return this.price * (1 - this.discountPercent / 100);
        },
        details: [
            "- Chất liệu: PolyCarbonat",
            "- Kính có màu trắng trong giúp người dùng rõ mắt khi đi trời nắng, không bị hạn chế khả năng nhìn khi đi trong đêm."
        ]
    },
];



//hien thi san pham
function displayProducts(productList, categoryName) {
    var itemsPerPage = 12;
    var currentPage = 1;

    // Lọc danh sách sản phẩm theo danh mục nếu categoryName không phải là 'all'
    var filteredProducts = categoryName === 'all' ? productList : productList.filter(function (product) {
        return product.category === categoryName;
    });

    // Function to render products based on pagination
    function renderProducts(page) {
        $('#productList').empty();

        var startIndex = (page - 1) * itemsPerPage;
        var endIndex = Math.min(startIndex + itemsPerPage, filteredProducts.length);
        var productListHtml = '';

        for (var i = startIndex; i < endIndex; i++) {
            var product = filteredProducts[i];
            var hasDiscount = product.discountPercent > 0;

            var productHtml = `
                <div class="col-md-4 col-lg-3 col-6 my-1 px-1">
                    <div class="product-card" data-product='${JSON.stringify(product)}'>
                        <img src="${product.image}" alt="${product.name}" class="product-image img-fluid">
                        <div class="product-content d-flex flex-column">
                            <div class="product-title">${product.name}</div>
                            <div class="product-description">${product.description}</div>
                            <div class="product-price-container">
                                ${hasDiscount ? `<div class="product-discount">${product.price.toLocaleString()}₫</div>` : ''}
                                <div class="product-price">${product.discountPrice.toLocaleString()}₫</div>
                            </div>
                        </div>
                        <div class="btn-discount ${hasDiscount ? '' : 'd-none'}">${hasDiscount ? `-${product.discountPercent.toLocaleString()}%` : ''}</div>
                    </div>
                </div>
            `;

            productListHtml += productHtml;
        }

        $('#productList').html(productListHtml);

        // Create pagination
        var totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
        $('#pagination').empty();
        for (var i = 1; i <= totalPages; i++) {
            var activeClass = i === currentPage ? 'active' : '';
            $('#pagination').append(`
                <li class="page-item ${activeClass}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>
            `);
        }
    }

    // Display initial products
    renderProducts(currentPage);

    // Handle pagination click
    $(document).on('click', '#pagination .page-link', function (e) {
        e.preventDefault();
        currentPage = $(this).data('page');
        renderProducts(currentPage);
        // Scroll to top of the page
        $('html, body').animate({ scrollTop: $('#top').offset().top }, 'slow');
    });

}





// Khai báo hàm khi tài liệu đã sẵn sàng hiển thị modal
$(document).ready(function () {
    // Sự kiện click vào .product-card
    $(document).on('click', '.product-card', function () {
        var product = $(this).data('product');
        showModal(product);
    });

    function showModal(product) {
        $('#productModalLabel').text(product.name);

        var modalContent = `
            <div class="row">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="zoomImg p-4">
                        <img src="${product.image}" alt="${product.name}" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 col-12">
                    <p><strong>Loại sản phẩm:</strong> ${product.category}</p>
                    <p><strong>Mô tả:</strong> ${product.description}</p>
                
        `;

        console.log(product.discountPercent + 'và' + product.discountPrice);

        // Kiểm tra và hiển thị chi tiết sản phẩm nếu có
        if (product.details && product.details.length > 0) {
            modalContent += `<p><strong>Chi tiết sản phẩm:</strong></p>`;
            modalContent += `<ul style="list-style:none">`;
            product.details.forEach(detail => {
                modalContent += `<li>${detail}</li>`;
            });
            modalContent += `</ul>`;
        }


        if (product.discountPercent > 0) {
            modalContent += `
            <div class="product-price-container">
                <div class="product-discount"><strong>Giá gốc:</strong>  ${product.price.toLocaleString()}₫</div>
                <div class="product-price"><strong>Giá khuyến mãi:</strong> ${product.discountPrice.toLocaleString()}₫</div>
                <div class="btn-discount"><strong>Giảm giá:</strong> ${product.discountPercent}%</div>
           </div>
            `;
        } else {
            // Kiểm tra và xử lý phần trăm giảm giá
            if (!isNaN(product.discountPercent)) {
                modalContent += `
                        <div class="product-price-container">
                            <div class="product-price "><strong>Giá bán: </strong> ${product.discountPrice.toLocaleString()} ₫</div>
                        </div>
                `;
            }
        }


        modalContent += `
            <div class="input-group mt-3">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-secondary btn-minus">-</button>
                </span>
                <input type="number" class="form-control text-center product-quantity" value="1">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-secondary btn-plus">+</button>
                </span>
            </div>
            <div class="d-flex flex-column flex-md-row  justify-content-between">
            <button class="btn btn-info  btn-add-to-cart m-2 w-100" data-name="${product.name}" data-price="${product.discountPrice}"> <i class="fa-solid fa-cart-plus text-light"></i> Thêm vào giỏ hàng</button>
            <button class="btn btn-warning  btn-buy-now m-2 w-100" data-name="${product.name}" data-price="${product.discountPrice}">Mua ngay</button>
            </div>
        </div>
        </div>`;

        $('#productModalBody').html(modalContent);
        $('#productModal').modal('show');


        // xử lý các nút bấm
        // Xử lý sự kiện click nút thêm số lượng
        $(document).on('click', '.btn-plus', function () {
            var input = $(this).closest('.input-group').find('input.product-quantity');
            var value = parseInt(input.val());
            input.val(value + 1);
        });

        // Xử lý sự kiện click nút trừ số lượng
        $(document).on('click', '.btn-minus', function () {
            var input = $(this).closest('.input-group').find('input.product-quantity');
            var value = parseInt(input.val());
            if (value > 1) {
                input.val(value - 1);
            }
        });





        //demo gpt

        function displayAddToCartAlert(name, discountPrice, quantity) {
            var alertHtml = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>${quantity} x ${name}</strong> đã được thêm vào giỏ hàng với đơn giá ${discountPrice.toLocaleString()} VND.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;

            // Hiển thị thông báo trong phần tử có id là 'alertContainer'
            $('#alertContainer').html(alertHtml);
        }



        // Xử lý sự kiện thêm sản phẩm vào giỏ hàng trong modal
        $(document).on('click', '#productModal .btn-add-to-cart', function () {
            // Lấy thông tin sản phẩm từ thuộc tính data-product trong modal

            // Lấy thông tin sản phẩm
            var name = product.name;
            var price = product.price; // Sử dụng giá khuyến mãi
            var discountPrice = product.discountPrice;
            var discountPercent = product.discountPercent;
            var image = product.image;
            var quantity = parseInt($('#productModal .product-quantity').val());

            // Thêm sản phẩm vào giỏ hàng
            addToCart(name, price, discountPrice, discountPercent, image, quantity);

            // Hiển thị thông báo khi sản phẩm được thêm vào giỏ hàng
            displayAddToCartAlert(name, discountPrice, quantity);

            // Cập nhật dropdown menu giỏ hàng
            updateCartDropdown();
        });




        // // Hàm cập nhật dropdown menu giỏ hàng
        // function updateCartDropdown() {
        //     // Lấy giỏ hàng từ localStorage
        //     var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        //     // Lấy phần tử chứa danh sách sản phẩm trong giỏ hàng
        //     var cartItemsContainer = $('.cart-items-container');

        //     // Kiểm tra nếu giỏ hàng rỗng
        //     if (cartItems.length === 0) {
        //         // Ẩn danh sách sản phẩm trong giỏ hàng và hiển thị thông báo "Chưa có sản phẩm nào trong giỏ hàng"
        //         cartItemsContainer.hide();
        //         $('.empty-cart-message').show();
        //     } else {
        //         // Hiển thị danh sách sản phẩm trong giỏ hàng và ẩn thông báo
        //         $('.empty-cart-message').hide();
        //         cartItemsContainer.empty(); // Xóa nội dung hiện tại của danh sách sản phẩm trong giỏ hàng

        //         // Duyệt qua từng sản phẩm trong giỏ hàng và hiển thị
        //         cartItems.forEach(function (item) {
        //             var productHtml = `
        //         <div class="dropdown-item">
        //             <div class="d-flex justify-content-between align-items-center">
        //                 <div class="d-flex align-items-center">
        //                     <img src="${item.image}" alt="${item.name}" class="mr-3" style="width: 50px;">
        //                     <div>
        //                         <div class="font-weight-bold">${item.name}</div>
        //                         <div>${item.quantity} x ${item.discountPrice.toLocaleString()} VND</div>
        //                     </div>
        //                 </div>
        //                 <button class="btn btn-danger btn-sm remove-from-cart" data-name="${item.name}">Xóa</button>
        //             </div>
        //         </div>
        //     `;
        //             // Thêm sản phẩm vào danh sách sản phẩm trong giỏ hàng
        //             cartItemsContainer.append(productHtml);
        //         });
        //         // Hiển thị danh sách sản phẩm trong giỏ hàng
        //         cartItemsContainer.show();
        //     }
        //     // Thêm sự kiện cho nút "Xóa" để loại bỏ sản phẩm khỏi giỏ hàng khi nhấn
        //     // Thay đổi phần gán sự kiện cho nút "Xóa" trong hàm updateCartDropdown()
        //     $('body').on('click', '.remove-from-cart', function () {
        //         var productName = $(this).data('name');
        //         removeFromCart(productName);
        //     });



        //     // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
        //     updateCartIcon(cartItems.length);
        // }

        // $(document).ready(function () {
        //     updateCartDropdown();
        // });


        // // Hàm loại bỏ sản phẩm khỏi giỏ hàng
        // function removeFromCart(productName) {
        //     // Lấy giỏ hàng từ localStorage
        //     var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        //     // Lọc sản phẩm có tên trùng khớp với tên được chọn để loại bỏ
        //     var updatedCartItems = cartItems.filter(function (item) {
        //         return item.name !== productName;
        //     });

        //     // Lưu giỏ hàng đã được cập nhật vào localStorage
        //     localStorage.setItem('cart', JSON.stringify(updatedCartItems));

        //     // Cập nhật dropdown menu giỏ hàng
        //     updateCartDropdown();
        // }



        // function updateCartIcon(numItems) {
        //     // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
        //     $('.num-item-in-cart').text(numItems);
        // }




        // Function to add product to cart
        function addToCart(name, price, discountPrice, discountPercent, image, quantity) {
            var product = {
                name: name,
                price: price,
                discountPrice: discountPrice,
                discountPercent: discountPercent,
                image: image,
                quantity: quantity
            };

            // Lấy giỏ hàng từ localStorage
            var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            var existingProductIndex = cartItems.findIndex(item => item.name === name);
            if (existingProductIndex !== -1) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, chỉ cập nhật số lượng
                cartItems[existingProductIndex].quantity += quantity;
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
                cartItems.push(product);
            }

            // Lưu giỏ hàng vào localStorage
            localStorage.setItem('cart', JSON.stringify(cartItems));

            // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
            updateCartIcon(cartItems.length);

            // Log để kiểm tra
            console.log('Đã thêm sản phẩm vào giỏ hàng:', product);
        }







        // Handle "Mua ngay" button click
        $(document).on('click', '.btn-buy-now', function () {
            // Lấy thông tin sản phẩm
            var name = product.name;
            var price = product.price; // Sử dụng giá khuyến mãi
            var discountPrice = product.discountPrice;
            var discountPercent = product.discountPercent;
            var image = product.image;
            var quantity = parseInt($('#productModal .product-quantity').val());

            // Thêm sản phẩm vào giỏ hàng
            addToCart(name, price, discountPrice, discountPercent, image, quantity);
            displayCheckoutRedirectAlert(name, discountPrice, quantity);
            updateCartIcon(cartItems.length);

            // Log để kiểm tra
            console.log('Đã thêm sản phẩm vào giỏ hàng:', product);
            console.log('Đang mua sản phẩm và chuyển hướng sang thanh toán');

        });

        // Hàm hiển thị thông báo khi mua ngay và chuyển hướng sang trang thanh toán
        function displayCheckoutRedirectAlert(name, discountPrice, quantity) {
            var total = discountPrice * quantity; // Tính tổng giá
            var alertHtml = `
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>${quantity} x ${name}</strong> đã được mua với giá ${discountPrice.toLocaleString()} VND.
                    <br>
                    <strong>Total: ${total.toLocaleString()} VND</strong>
                    <div class="spinner-border"></div>
                    <p> Đang chuyển hướng sang trang thanh toán sau 3 giây ...</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;

           
          
            // Hiển thị thông báo trong phần tử có id là 'alertContainer'
            $('#alertContainer').html(alertHtml);

            // Tự động đóng thông báo sau 10 giây
            setTimeout(function () {
                $('.alert').alert('close');

                // Chuyển hướng người dùng sang trang thanh toán sau 3 giây ...
                window.location.href = '../html/gio-hang.html'; // Thay 'trang-thanh-toan.html' bằng đường dẫn đến trang thanh toán của bạn
            }, 3000); // 3 giây
        }

    }

});








$(document).ready(function () {
    var images = $('.image-container img');
    var currentIndex = 0;

    function showImage(index) {
        images.removeClass('active');
        images.eq(index).addClass('active');
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    // Tự động chuyển ảnh sau mỗi 3 giây
    setInterval(nextImage, 5000);
});
$(document).ready(function () {
    // Lấy dữ liệu thành viên từ localStorage nếu có
    var users = JSON.parse(localStorage.getItem('users')) || [];

    // Hiển thị danh sách thành viên
    function displayMembers() {
      var memberTable = $('#memberList');
      memberTable.empty();
      users.forEach(function(user) {
        var row = $('<tr>');
        row.append('<td>' + user.fullName + '</td>');
        row.append('<td>' + user.username + '</td>');
        row.append('<td>' + user.email + '</td>');
        row.append('<td>' + user.phone + '</td>');
        row.append('<td>' + user.dob + '</td>');
        row.append('<td>' + user.address + '</td>');
        memberTable.append(row);
      });
    }

    displayMembers();

    $('#registerForm').submit(function (e) {
      e.preventDefault();
      if (this.checkValidity()) {
        var formData = $(this).serializeArray();
        var userObject = {};
        $.each(formData, function (i, field) {
          userObject[field.name] = field.value;
        });
        users.push(userObject);
        localStorage.setItem('users', JSON.stringify(users)); // Lưu vào localStorage
        displayMembers(); // Hiển thị lại danh sách thành viên
        alert('Đăng ký thành công!');
        $('#registerForm')[0].reset();
      } else {
        e.stopPropagation();
        $(this).addClass('was-validated');
      }
    });

    $('#loginForm').submit(function (e) {
        e.preventDefault();
        var username = $('#loginUsername').val();
        var password = $('#loginPassword').val();
        var foundUser = users.find(function(user) {
          return user.username === username && user.password === password;
        });
        if (foundUser) {
          alert('Đăng nhập thành công!');
          // Thực hiện các hành động sau khi đăng nhập thành công
        } else {
          alert('Tên đăng nhập hoặc mật khẩu không đúng!');
        }
      });

  });


// Hàm cập nhật dropdown menu giỏ hàng
function updateCartDropdown() {
    // Lấy giỏ hàng từ localStorage
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Lấy phần tử chứa danh sách sản phẩm trong giỏ hàng
    var cartItemsContainer = $('.cart-items-container');

    // Kiểm tra nếu giỏ hàng rỗng
    if (cartItems.length === 0) {
        // Ẩn danh sách sản phẩm trong giỏ hàng và hiển thị thông báo "Chưa có sản phẩm nào trong giỏ hàng"
        cartItemsContainer.hide();
        $('.empty-cart-message').show();
    } else {
        // Hiển thị danh sách sản phẩm trong giỏ hàng và ẩn thông báo
        $('.empty-cart-message').hide();
        cartItemsContainer.empty(); // Xóa nội dung hiện tại của danh sách sản phẩm trong giỏ hàng

        // Duyệt qua từng sản phẩm trong giỏ hàng và hiển thị
        cartItems.forEach(function (item) {
            var productHtml = `
        <div class="dropdown-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="${item.image}" alt="${item.name}" class="mr-3" style="width: 50px;">
                    <div>
                        <div class="font-weight-bold">${item.name}</div>
                        <div>${item.quantity} x ${item.discountPrice.toLocaleString()} VND</div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm remove-from-cart" data-name="${item.name}">Xóa</button>
            </div>
        </div>
    `;
            // Thêm sản phẩm vào danh sách sản phẩm trong giỏ hàng
            cartItemsContainer.append(productHtml);
        });
        // Hiển thị danh sách sản phẩm trong giỏ hàng
        cartItemsContainer.show();
    }
    // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
    updateCartIcon(cartItems.length);
}

$(document).ready(function () {
    updateCartDropdown();
});

// Gán sự kiện cho nút "Xóa" bằng cách sử dụng $(document).on()
$(document).on('click', '.remove-from-cart', function () {
    var productName = $(this).data('name');
    removeFromCart(productName);
});

// Hàm loại bỏ sản phẩm khỏi giỏ hàng
function removeFromCart(productName) {
    // Lấy giỏ hàng từ localStorage
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Lọc sản phẩm có tên trùng khớp với tên được chọn để loại bỏ
    var updatedCartItems = cartItems.filter(function (item) {
        return item.name !== productName;
    });

    // Lưu giỏ hàng đã được cập nhật vào localStorage
    localStorage.setItem('cart', JSON.stringify(updatedCartItems));

    // Cập nhật dropdown menu giỏ hàng
    updateCartDropdown();
}

function updateCartIcon(numItems) {
    // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
    $('.num-item-in-cart').text(numItems);
}


$(document).ready(function () {
    // Trích xuất dữ liệu từ Local Storage
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Lấy phần tử chứa danh sách sản phẩm trong giỏ hàng
    var cartItemsContainer = $('#cart-items-container');

    // Hiển thị danh sách sản phẩm trong giỏ hàng
    if (cartItems.length === 0) {
        cartItemsContainer.html('<p>Giỏ hàng của bạn đang trống.</p>');
    } else {
        cartItemsContainer.empty();
        cartItems.forEach(function (item) {
            // Tính tổng cộng
            var total = item.discountPrice * item.quantity;
            var discountPercent = ((item.price - item.discountPrice) / item.price) * 100;

            var productHtml = `
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="${item.image}" alt="${item.name}" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="product-discount">Giá gốc: ${item.price.toLocaleString()} VND</p>
                                <p class="product-price">Giá giảm: ${item.discountPrice.toLocaleString()} VND</p>
                                <p class="btn btn-danger text-center">-${discountPercent}%</p>   <span class="card-text">Số lượng: ${item.quantity}</span>
                              
                            </div>
                        </div>
                    </div>
                </div>
            `;
            cartItemsContainer.append(productHtml);
        });
    }
});

$(document).ready(function () {
    // Trích xuất dữ liệu từ Local Storage
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Lấy phần tử chứa bảng hóa đơn
    var billTable = $('#bill-table');

    // Hiển thị bảng hóa đơn
    if (cartItems.length === 0) {
        billTable.html('<p>Không có sản phẩm nào trong giỏ hàng.</p>');
    } else {
        // Tạo header cho bảng hóa đơn
        var tableHtml = `
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá gốc (VND)</th>
                        <th scope="col">Giá giảm (VND)</th>
                        <th scope="col">Phần trăm khuyến mãi (%)</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng cộng (VND)</th>
                    </tr>
                </thead>
                <tbody id="bill-body">
                </tbody>
            </table>
        `;

        billTable.html(tableHtml);

        var billBody = $('#bill-body');

        // Duyệt qua từng sản phẩm và thêm vào bảng hóa đơn
        cartItems.forEach(function (item, index) {
            var total = item.discountPrice * item.quantity;
            var discountPercent = ((item.price - item.discountPrice) / item.price) * 100;

            var rowHtml = `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${item.name}</td>
                    <td>${item.price.toLocaleString()}</td>
                    <td>${item.discountPrice.toLocaleString()}</td>
                    <td>${discountPercent.toFixed(2)}</td>
                    <td>${item.quantity}</td>
                    <td>${total.toLocaleString()}</td>
                </tr>
            `;
            billBody.append(rowHtml);
        });
    }
});
