// = = = = = = = = = = = = = = = = changeImg = = = = = = = = = = = = = = = =
function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        function readFile(index) {
            if (index >= input.files.length) return;
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $(input).siblings('.thumbnail').attr('src', e.target.result);
            }
        }
        for (let i = 0; i < input.files.length; i++) {
            reader.readAsDataURL(input.files[i]);
        }
        // let index = 0;

        // function readFile(index) {
        //     if (index >= input.files.length) return;
        //     let file = input.files[len];
        //     reader.onload = function(e) {
        //         $(input).siblings('.thumbnail').attr('src', e.target.result);
        //         readFile(index + 1);
        //     }
        //     reader.readAsDataURL(file);
        // }
        // readFile(0);
    }
}
//Khi click #thumbnail thì cũng gọi sự kiện click #image
$(document).ready(function() {
    $('.thumbnail').click(function() {
        $(this).siblings('.image').click();
    });
});