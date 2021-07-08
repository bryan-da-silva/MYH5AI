$(document).ready(function () {
    var search = document.getElementsByTagName('form');
    var imgSearch = document.getElementsByTagName('img');
    var nameDir = document.getElementsByClassName('content');
    var Isearch = 0;
    imgSearch[0].onclick = () => {
        if (Isearch === 0) {
            search[0].style.display = 'inline-block';
            Isearch = 1;
        } else {
            search[0].style.display = 'none';
            Isearch = 0;
        }
    }
    nameDir[0].textContent = document.getElementsByClassName('nameDossiers')[0].textContent;
    $(".nameDossiers").click(function () {
        //var result = document.getElementsByClassName('result');
        //console.log($(this).attr("id"));
        var test = $(this).attr("id");
        console.log(test);
        $(".donnee > #" + test).css('display', 'block');  
    });
});