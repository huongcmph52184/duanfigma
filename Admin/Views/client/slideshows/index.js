const listImgaes = document.querySelector('.list-imgaes');
const imgs = document.querySelectorAll('.list-imgaes img');

const length = imgs.length; // Đã bao gồm ảnh clone
let current = 0;

const slide = () => {
    let width = imgs[0].offsetWidth;

    // Tăng chỉ số ảnh
    current++;
    listImgaes.style.transform = `translateX(${-width * current}px)`;

    // Khi đạt đến clone, reset về ảnh đầu
    if (current === length - 1) {
        setTimeout(() => {
            listImgaes.style.transition = 'none'; // Tắt hiệu ứng chuyển động
            current = 0; // Reset chỉ số về ảnh đầu
            listImgaes.style.transform = `translateX(0px)`;

            // Bật lại hiệu ứng sau khi reset
            setTimeout(() => {
                listImgaes.style.transition = 'transition 0.5s';
            }, 50); // Chỉ cần một thời gian nhỏ để reset
        }, 1000); // Phù hợp với thời gian chuyển động (CSS transition)
    }
};

// Tự động chạy slideshow
let slideshow = setInterval(slide, 3000);
