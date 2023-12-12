/*!
* Start Bootstrap - Shop Item v5.0.6 (https://startbootstrap.com/template/shop-item)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-item/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
//Rating stars

    //Display rating box and btn
    const btn_rating = document.querySelector(".btn_rating_active");
    const rating_box = document.querySelector(".rating-box");
    const rating_submit = document.querySelector("#ratingBtn")
    btn_rating.addEventListener("click",()=>{
        btn_rating.classList.add('btn_rating_disabled');
        btn_rating.classList.remove('btn_rating_active');
        rating_box.classList.add('rating-active');
        rating_box.classList.remove('rating-disabled');
        rating_submit.classList.remove('disabled');
    })

    //Select all elements with 'i' tag and store them in a NodeList called "stars"
    const stars = document.querySelectorAll(".stars i");
    const ratingValueInput = document.querySelector("#ratingValue");
    //Loop through 'stars' Nodelist
    var selectRating;
    stars.forEach((star,index1) => {
        star.addEventListener("click",()=>{
            selectRating = index1+1;
            console.log(index1+1)
            console.log("select: "+selectRating);
            ratingValueInput.value = selectRating.toString();
            // Loop through the "stars" NodeList again
            stars.forEach((star,index2)=>{
                index1 >= index2 ? star.classList.add("active"): star.classList.remove('active')
            })
        })
    })
    document.addEventListener('DOMContentLoaded', function() {
        var commentForm = document.getElementById('commentForm');
        var ratingNotification = document.getElementById('ratingNotification');

        commentForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Kiểm tra xem người dùng đã đánh giá hay chưa
            var ratingValue = document.getElementById('ratingValue').value;
            var commentValue = document.getElementById('commentValue').value;
            if (ratingValue === '') {
                // Hiển thị thông báo yêu cầu đánh giá
                ratingNotification.style.display = 'block';
            } else if(commentValue === ''){
                commentNotification.style.display = 'block'
            }else {
                // Gửi biểu mẫu bình luận
                commentForm.submit();
            }
        });
    });

    // Scroll
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            event.preventDefault();
            
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });
    });
    function getData(page) {
        var element = document.getElementById('idProduct')
        var pId = window.location.pathname;
        console.log(pId);
        // var productId = element.getAttribute('data-product-id')
        var url = pId + '?page=' + page;
        $.ajax({
            url: url,
            type: "get",
            datatype: "html",
        })
        .done(function(data){
            $("#data-wrapper").empty().html("<div class='row'>" + data + "</div>");
            location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
