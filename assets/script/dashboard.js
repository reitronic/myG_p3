$('document').ready(function(){
    // Define function to load dashboard
        function displayDashboard(){
            $.ajax({
                url: 'anitaAllSucculents.json',
                type: 'get',
                dataType: 'JSON',
                cache: false,
                error: function (data) {
                    console.log(data);
                },
                success: function (data) { 
                        $.each(data, function (index, value){
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
            $.ajax({
                url: 'anitaAllFoliage.json',
                type: 'get',
                dataType: 'JSON',
                cache: false,
                error: function (data) {
                    console.log(data);
                },
                success: function (data) { 
                        $.each(data, function (index, value){
                            // list out variables
                            console.log('hey w00t w00t! foliage');
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
    
                            function getTodayDate(){ //string
                                var td = new Date();
                                var today = td.toLocaleDateString();
                                if( today[1] == "\/" ){
                                    return ('0'+today);
                                };
                            }; //today's date in string notation ie. 08/23/2019 to compare with JSON

                            if( nwdUD == todayUD && lwdUD < todayUD ){
                                $('#todayDisplay').append('<div class="needWater dl" id="'+uid+'"></div>');
                                $("#"+uid+"").append(
                                    `<form class="watercheckbox" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="uid" value="${uid}">
                                    <input type="hidden" name="doneThisDate" value="getTodayDate();">
                                    <img src="${img}" class="card-img">
                                    <input type="submit"  name="watered" value="Water ${pnn}" class="odbtn btn btn-success text-dark">
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
                                $('#pastDueDisplay').append('<div class="dl needWater" id="'+uid+'"></div>');
                                $('#'+uid+'').append(
                                    `<form method="post" class="watercheckbox" enctype="multipart/form-data">
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
            });//end of 2 ajax
            waterThisNow();
        };
    displayDashboard();

    function waterThisNow(){
        $('#mainDisplay').on('click', '.odbtn', function(event){
            var thisForm = $(this).closest('form')[0];
            console.log(thisForm);
            
            event.stopPropagation();
            event.stopImmediatePropagation();
           
            thisForm.submit(function(e){
                // e.stopPropagation();
                // e.stopImmediatePropagation();
                var formData = new FormData(thisForm);
                console.log(formData);
                $.ajax({
                    url: "dhDoneDashboard.php",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(){
                        console.log('working!');
                        // displayDashboard();
                        location.href ='dhDoneDashboard.php';
                        // $('#todayCompletedDisplay').html(data);
                    },
                });
                e.preventDefault();
                $('.dl').remove();
                console.log('helo');
            });
           
            
            event.preventDefault();
        });
    };//end of water this now func
    // event.preventDefault();
});


// waterThisNow();


// function waterThisNow(){
//     // $(this).click(function(){});
//     $('.needWater').on('submit', 'form', function (e) {
// // $('form').submit(function (e) {
//         // $('form').submit(function(e){
//  $('.needWater').remove();
//  var formData = new FormData($(this)[0]);
//         // console.log(name); //name (pnn)
//          $.ajax({
//              url: "dhDoneDashboard.php",
//              type: "POST",
//              data: formData,
//              cache: false,
//              contentType: false,
//              processData: false,
//              success: function(){
//                  console.log('working!');
//                  // displayDashboard();
//                  location.href ='dhDoneDashboard.php';
//                  // $('#todayCompletedDisplay').html(data);
//              },
//          });
//          e.preventDefault();
//      });
//     }

//end of water done function




//end of doc script
          //wrap below in a function and call that function after the success of dynamically loaded data above


/*
`<form method="post" enctype="multipart/form-data" class="card">
    <input type="submit" name="watered" value="Water ${pnn}" class="odbtn btn btn-success text-dark">
    <input type="hidden" name="uid" value="${uid}">
    <input type="hidden" name="doneThisDate" value="getTodayDate();">
    <img src="${img}" class="card-img">
</form>`
*/
