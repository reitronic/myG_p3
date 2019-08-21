$('document').ready(function(){
    $('.odbtn').on('click', function(){
    var wyn = $(this).val();
    var uid = $("input:hidden").val();
    var done = "wyn="+yes+"&uid="+uid;
        $.ajax({
            url: 'adDoneDashboard.php',
            type: 'POST',
            data: done,
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function(){
                console.log('working!');
                displayDashboard();
            }
        });
    });
});