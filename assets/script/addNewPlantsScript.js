$('document').ready(function(){
// FOLIAGE PLANT TYPE ASK

$('div#addnewfoliage').on('click', function(){
    $(this).next().show();
    $('#askName').change(function(){
        $('#searchbar').show();
    });
    $.ajax({
        url: 'ptList.json',
        type: 'get',
        dataType: 'JSON',
        cache: false,
        error: function(data){
            console.log(data);
        },
        success: function(data){
            // console.log(data.Foliage);
            var dl = $('#fList');
            var fl = data.Foliage.uid;
            var flid;
            for(flid in fl){
                var pv = fl[flid].pv;
                var sn = fl[flid].sn;
                var opt = `<option value="${pv}" id="${flid}" data-sn="${sn}">AKA ${sn}</option>`;
                dl.append(opt);
                // var sn = opt.data('sn');
            }
        } //end of success
    });
    $('#ifFoliage').click(function(){
        $('#uploadF').show();
    }); 
});
});


// SUCCULENT PLANT TYPE ASK
    $('div#addnewSucculent').on('click', function(){
        $(this).next().show();
        $('#askSucculentName').change(function(){
            $('#searchbarSucculent').show();
        });
        $.ajax({
            url: 'ptList.json',
			type: 'get',
			dataType: 'JSON',
			cache: false,
			error: function(data){
				console.log(data);
            },
            success: function(data){
                var sdl = $('#sList');
                var sl = data.Succulent.uid;
                var sid;
                for(sid in sl){
                    var pv = sl[sid].pv;
                    var sn = sl[sid].sn;
                    var sopt = `<option value="${pv}" id="${sid}" data-sn="${sn}"> AKA ${sn}</option>`
                    sdl.append(sopt);
                    // var sn = sopt.data('sn');
                }
            }
        });
        $('#ifSucculent').click(function(){
            $('#uploadSucculentPhoto').show();

    });
});

