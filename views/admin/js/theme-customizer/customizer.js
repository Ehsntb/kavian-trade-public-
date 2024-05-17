if(localStorage.getItem("color"))
    $("#color" ).attr("href", "../assets/css/"+localStorage.getItem("color")+".css" );
if(localStorage.getItem("dark"))
    $("body").attr("class", "rtl");
(function() {
})();

$(".page-wrapper").attr("class", "page-wrapper compact-wrapper modern-sidebar");
localStorage.setItem('page-wrapper', 'compact-wrapper modern-sidebar');
