$('document').ready(function () {
    // Define function to load dashboard
    function displayDashboard() {
        $.ajax({
            url: 'anitaAllFoliage.json',
            type: 'get',
            dataType: 'JSON',
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                $.each(data, function (index, value) {
                    // list out variables
                    console.log('hey w00t w00t! foliage');
                    console.log(index, value);
                    var pt = value.pt;
                    var pnn = value.pnn;
                    var pv = value.pv;
                    var uid = value.uid;
                    var img = value.img;
                    var lwd = value.lwd;
                    var nwd = value.nwd
                    // console.log(value.lwd);

                    var lwdDate = new Date(lwd);
                    var lwdUD = lwdDate.setHours(0, 0, 0, 0);//date ob
                    // console.log(lwdUD);
                    
                    var nwdDate = new Date(nwd);
                    var nwdUD = nwdDate.setHours(0, 0, 0, 0);//date ob
                    // console.log('nwd' + nwdUD);

                    var todayDate = new Date();
                    var todayUD = todayDate.setHours(0, 0, 0, 0);//date ob

                    if ((lwdUD < todayUD || lwd == '') && nwdUD == todayUD) {
                        $('#todayDisplay').append(
                            '<div class="dl needWater" id="' + uid + '"></div>');
                        $('#' + uid + '').append(
                            `<div class="card" style="width: 18rem;">
                            <h2 class="display-5">${pnn}: ${pv}</h2>
                            <form method="post" class="watercheckbox" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="${uid}">
                                <input type="hidden" name="pnn" value="${pnn}">
                                <input type="hidden" name="ontime" value=true>
                                <img src="${img}" class="card-img">
                                <p>${pt}</p>
                                <input type="submit" name="submit" value="Water ${pnn}" onclick="waterThisNow()" class="odbtn btn btn-success text-dark">
                            </form></div>`
                        );
                    } else if (lwdUD == todayUD) { //then this is completed today
                        $('#todayCompletedDisplay').append('<div class="dl" id="' + uid + '"></div>');
                        $('#' + uid + '').append(
                            `<div class="card" style="width: 18rem;">
                                    <img src="${img}" class="card-img">
                                    <p class="card-text">${pnn}: the ${pv}</p>
                                    <p>${pt}</p>
                            </div>`
                        );
                    } else if (nwdUD < todayUD) { //then this is past due
                        $('#pastDueDisplay').append('<div class="dl needWater" id="' + uid + '"></div>');
                        $('#' + uid + '').append(
                            `<div class="card" style="width: 18rem;">
                            <h2 class="display-5">${pnn}: the ${pt}</h2>
                            <form method="post" class="watercheckbox" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="${uid}">
                                <input type="hidden" name="pnn" value="${pnn}">
                                <input type="hidden" name="ontime" value=false>
                                <img src="${img}" class="card-img">
                                <p>${pt}</p>
                                <input type="submit" name="submit" value="Water ${pnn}" onclick="waterThisNow()" class="odbtn btn btn-success text-dark">
                            </form></div>`
                        );
                    } else if ((lwdUD <= todayUD || lwd == '') && nwdUD > todayUD) {
                        
                        //upcoming plants to water / have watered already
                        $('#upcomingDisplay').append('<div class="dl" id="' + uid + '"></div>');
                        $('#' + uid + '').append(
                            `<div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <img src="${img}" class="card-img">
                                    <p class="card-text">${pnn}: the ${pv}</p>
                                    <p class="card-text font-weight-bold">Next Watering Date: ${nwd}</p>
                                    <p>${pt}</p>
                                    </div>
                                </div>`
                        );
                    };
                    waterThisNow();
                })//end of conditional statement
            } //end of success call
        })//end of ajax displaydashboard
    } // end of displaydashboard function declaration
    displayDashboard();

    function waterThisNow() {
        $('form').submit(function (e) {
            $('.dl').remove();
            var nowtime = new Date(); //object
            // console.log(nowtime);
            var formData = new FormData($(this)[0]);
            formData.append('ts', nowtime);
            // console.log(formData);
                $.ajax({
                    url: 'dhDoneDashboard.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function () {
                        console.log('yes!');
                        console.log('finally made it!');
                        displayDashboard();
                    }
                });//end of ajax call */
                e.preventDefault();
                e.stopImmediatePropagation();
                e.stopPropagation();
        }) //end of submit form / check box funciton
    }//end of checkbox function
})

