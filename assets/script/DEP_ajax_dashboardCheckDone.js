$('document').ready(function(e) {
    e.stopPropagation();
    e.stopImmediatePropagation();
    $('.odbtn').on('click', function() {
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
        })
        e.stopImmediatePropagation();
    })
})

//below is the succulent ajax -- work on this after figure out foliage ajax (since same procedure)

/*
 $.ajax({
                url: 'anitaAllSucculents.json',
                type: 'get',
                dataType: 'JSON',
                cache: false,
                error: function (data) {
                    console.log(data);
                },
                success: function (data) { 
                        $.each(data, function (index, value) {
                            // list out variables
                            console.log('hey w00t w00t! succulent');
                            console.log(index, value);

                            var pt = value.pt;
                            var pnn = value.pnn;
                            var pv = value.pv;
                            var uid = value.uid;
                            var wyn = value.wyn; //watered yes or no
                            var fq = value.fq;
                            var img = value.img;
                            
                            var lwd = value.lwd;
                            var nwd = value.nwd
                                        // console.log(value.lwd);
                            var lwdDate = new Date(lwd);
                            var lwdUD = lwdDate.setHours(0,0,0,0);//date ob
                            var nwdDate = new Date(nwd);
                            var nwdUD = nwdDate.setHours(0,0,0,0);//date ob
                            var todayDate = new Date();
                            var todayUD = todayDate.setHours(0,0,0,0);//date ob
                                    // console.log(todayUD <= nwdUD);
    
                            function getTodayDate(){
                                var td = new Date();
                                var today = td.toLocaleDateString();
                                if( today[1] == "\/" ){
                                    return ('0'+today);
                                };
                            }; //today's date in string notation ie. 08/23/2019 to compare with JSON
    
                            if( nwdUD == todayUD && lwdUD < todayUD ){
                                $('#todayDisplay').append('<div class="needWater dl" id="'+uid+'"></div>');
                                $("#"+uid+"").append(
                                    `<form class="watercheckbox" method="post" enctype="multipart/form-data" class="card">
                                    <input type="hidden" name="uid" value="${uid}">
                                    <input type="hidden" name="doneThisDate" value="${getTodayDate()}">
                                    <img src="${img}" class="card-img">
                                    <input type="submit" name="watered" value="Water ${pnn}" class="odbtn btn btn-success text-dark">
                                </form>`
                                );
                            } else if( lwdUD == todayUD ){ //then this is completed today
                                $('#todayCompletedDisplay').append('<div class="dl" id="'+uid+'"></div>');
                                $('#'+uid+'').append(
                                `<div class="card" style="width: 18rem;">
                                    <img src="${img}" class="card-img"> class="card-img">
                                    <p class="card-text">${pnn}: the ${pv}</p>
                                    </div>
                                </div>`
                                );
                            } else if( nwdUD < todayUD ){ //then this is past due
                                $('#pastDueDisplay').append('<div class="needWater dl" id="'+uid+'"></div>');
                                $('#'+uid+'').append(
                                    `<form class="watercheckbox" method="post" enctype="multipart/form-data" class="card">
                                    <input type="hidden" name="uid" value="${uid}">
                                    <input type="hidden" name="doneThisDate" value="getTodayDate();">
                                    <img src="${img}" class="card-img">
                                    <input type="submit" name="watered" value="Water ${pnn}" class="odbtn btn btn-success text-dark">
                                </form>`
                                );
                            } else if( nwdUD > todayUD && lwdUD <= todayUD){ //upcoming plants to water / have watered already
                                $('#upcomingDisplay').append('<div class="dl" id="'+uid+'"></div>');
                                $('#'+uid+'').append(
                                `<div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <img src="${img}" class="card-img">
                                    <p class="card-text">${pnn}: the ${pv}</p>
                                    </div>
                                </div>`
                                );
                            };
                        });
                
                }
            }); //end of 1 ajax
*/