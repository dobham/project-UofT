tags = [];
$("#textBox").keypress(function (e) {
    if (tags.length <= 4 && e.which === 32) {
        $(".target").append("<a href='#' class='tag' >"  + this.value.split(" ").pop() +'<span class="cross">X</span>'+ "</a>");
        tags.push(this.value);
    }
    else if (tags.length >= 6) {
        alert("6 Tags Already Present!");
    }
});
$('body').on('click','.cross',function(){
    tags.splice($(this).parent('a').html(), 1);
    $(this).parent('a').remove();
});

