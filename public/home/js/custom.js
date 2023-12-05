// to get current year
// function getYear() {
//     var currentDate = new Date();
//     var currentYear = currentDate.getFullYear();
//     document.querySelector("#displayYear").innerHTML = currentYear;
// }

// getYear();


/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

//Scroll
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     var scrollpos = localStorage.getItem('scrollpos');
    //     if (scrollpos) window.scrollTo(0, scrollpos);
    // });

    // window.onbeforeunload = function (e) {
    //     localStorage.setItem('scrollpos', window.scrollY);
    // };

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

// categories
document.addEventListener("DOMContentLoaded", function () {
    const postBlocksContainer = document.querySelector(".posts-container");
    const tagButtons = document.querySelectorAll(".tag-button");
    const loadMoreButton = document.getElementById("loadMoreButton");
    const postBlocks = document.querySelectorAll(".post");

    let selectedTag = "all"; // Initially, "all" tag is selected
    let currentPage = 1;
    const itemsPerPage = 3;

    function filterPostsByTag(tag) {
        selectedTag = tag;
        currentPage = 1; // Reset current page when changing tags

        // Clear existing posts in the container
        postBlocksContainer.innerHTML = '';

        const filteredPostBlocks = Array.from(postBlocks).filter((block) => {
            const tags = block.getAttribute("data-tags").split(",");
            return selectedTag === "all" || tags.includes(selectedTag);
        });

        showPostsForPage(currentPage, filteredPostBlocks);
        updateLoadMoreButton(filteredPostBlocks);
    }

    function showPostsForPage(pageNumber, postBlocks) {
        const startIndex = (pageNumber - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, postBlocks.length);

        for (let i = startIndex; i < endIndex; i++) {
            postBlocksContainer.appendChild(postBlocks[i].cloneNode(true));
        }
    }

    function updateLoadMoreButton(filteredPostBlocks) {
        const visiblePostCount = filteredPostBlocks.length;

        if (visiblePostCount <= currentPage * itemsPerPage) {
            loadMoreButton.style.display = "none";
        } else {
            loadMoreButton.style.display = "block";
        }
    }

    function loadMorePosts() {
        currentPage++;
        const filteredPostBlocks = Array.from(postBlocks).filter((block) => {
            const tags = block.getAttribute("data-tags").split(",");
            return selectedTag === "all" || tags.includes(selectedTag);
        });

        showPostsForPage(currentPage, filteredPostBlocks);
        updateLoadMoreButton(filteredPostBlocks);
    }

    tagButtons.forEach((button) => {
        button.addEventListener("click", () => {
            tagButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");
            const tag = button.getAttribute("data-tag");
            filterPostsByTag(tag);
        });
    });

    loadMoreButton.addEventListener("click", loadMorePosts);

    // Initial setup
    filterPostsByTag(selectedTag);
});
