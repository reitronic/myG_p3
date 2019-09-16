
    /* function getTodayDate() { //string
        var td = new Date();
        var today = td.toLocaleDateString();
        if (today[1] == "\/") {
            return ('0' + today);
        };
    }; //today's date in string notation ie. 08/23/2019 to compare with JSON */


/*
            var weekday = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            var day = weekday[nowtime.getDay()];
            console.log(day);
            console.log(typeof day);

            var nt = nowtime.toLocaleDateString();
            // var nt = "11/22/2019";
            // console.log(nt);
            function fmtDate(nt) {
                if (nt.length < 10) {
                    if (nt.length == 9) {
                        if (nt[1] == '\/') {
                            nt = "0" + nt.slice(0);
                            return nt;
                        } else {
                            nt = nt.slice(0, 3) + "0" + nt.slice(3);
                            return nt;
                        }
                    } else if (nt[1] == '\/' && nt[3] == '\/') {
                        nt = "0" + nt.slice(0, 2) + "0" + nt.slice(2);
                        return nt;
                    };
                } else {
                    return nt;
                }
            };
            nt = fmtDate(nt);
            // console.log(nt);
            // console.log(typeof nt);
*/
            
            // var thisPlant = $(this)[0];
            // console.log('this is the console log of thisPlant');
            // console.log(thisPlant);
            // console.log('this is the console log the type of thisPlant');
            // // console.log(typeof thisPlant); //object
            // $('.dl').remove();