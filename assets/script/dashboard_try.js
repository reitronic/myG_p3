$(document).ready(function () {
    // Define function to load dashboard
    function displayDashboard() {
        $.ajax({
            url: 'anitaAllFoliage.json',
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                $.each(data, function (index, value) {
                    // list out variables
                    console.log(index, value);
                    var pt = value.pt;
                    var pnn = value.pnn;
                    var pv = value.pv;
                    var plantid = index;
                    var img = value.img;
                    var lwd = value.lwd;
                    var nwd = value.nwd
                    console.log(plantid);
                    var lwdDate = new Date(lwd);
                    var lwdUD = lwdDate.setHours(0, 0, 0, 0);//date ob
                    // console.log(lwdUD);
                    var nwdDate = new Date(nwd);
                    var nwdUD = nwdDate.setHours(0, 0, 0, 0);//date ob
                    // console.log('nwd' + nwdUD);
                    var todayDate = new Date();
                    var todayUD = todayDate.setHours(0, 0, 0, 0);
                    if ((lwdUD < todayUD || lwd == '') && nwdUD == todayUD) {
                        $('#todayDisplay').append(
                            '<div class="dl" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `
                            <div class="img" style="background-image:
                            url('${img}')"></div>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="plantid" value="${plantid}">
                                <input type="hidden" name="pnn" value="${pnn}">
                                <input type="hidden" name="ontime" value=false>
                                <input type="submit" name="submit" value="Water ${pnn}" class="odbtn">
                            </form>`
                        );
                    } else if (lwdUD == todayUD) { //then this is completed today
                        $('#todayCompletedDisplay').append('<div class="dl" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `
                            <div class="img" style="background-image:
                            url('${img}')"></div>
                            <div class="pcd">
                            <p class="emph">${pnn}</p>
                                    <p>Next Watering Date:<br>
                                        <span class="output"> ${nwd}</span></p></div>`
                        );
                    } else if (nwdUD < todayUD) { //then this is past due
                        $('#pastDueDisplay').append('<div class="dl" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `<div class="img" style="background-image: url('${img}')"></div>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="plantid" value="${plantid}">
                                <input type="hidden" name="pnn" value="${pnn}">
                                <input type="hidden" name="ontime" value=false>
                                <input type="submit" name="submit" value="Water ${pnn}" id="pdpw" class="odbtn">
                            </form>`
                        );
                    } else if ((lwdUD <= todayUD || lwd == '') && nwdUD > todayUD) {
                        //upcoming plants to water / have watered already
                        $('#upcomingDisplay').append('<div class="dl" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `<div class="img" style="background-image:
                            url('${img}')"></div>
                            <div class="pcd">
                            <p class="emph">${pnn}</p>
                                    <p>Next Watering Date:
                                        <span class="output"> ${nwd}</span></p></div>`
                        );
                    };
                    // waterThisNow();
                })
            } //end of success call
        })//end of ajax displaydashboard
    }
    displayDashboard(waterThisNow);

    function waterThisNow() {
        $('form').submit(function (e) {
            $('.dl').remove();
            var nowtime = new Date();
            var formData = new FormData($(this)[0]);
            formData.append('ts', nowtime);
            $.ajax({
                url: 'dhDoneDashboard.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function () {
                    console.log('ajax complete');
                    displayDashboard();
                }
            });//end of ajax call */
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        })
    }//end of checkbox function
})

