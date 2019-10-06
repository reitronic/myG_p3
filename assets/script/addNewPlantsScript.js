$('document').ready(function(){
    $('#addnewfoliage').on('click', function () {
        $('#addnewfoliage .addBtn').hide();
        $('#fForm').toggle();
        $.ajax({
            url: 'ptList.json',
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                var dl = $('#fList');
                var fl = data.Foliage.uid;
                var flid;
                for (flid in fl) {
                    var pv = fl[flid].pv;
                    var sn = fl[flid].sn;
                    var opt = `<option value="${pv}" id="${flid}" data-sn="${sn}">AKA ${sn}</option>`;
                    dl.append(opt);
                }
            } //end of success
        });//end ajax
        $('input:radio').click(function () { 
        if ($(this).val() != 'yes') {
            $('#yw').css('display', 'none');
            $('#nw').css('display', 'block');
        } else { 
            $('#yw').css('display', 'block');
            $('#nw').css('display', 'none');
        }
    });

        
    });
});


/* 
// SUCCULENT PLANT TYPE ASK
   $('button#addnewSucculent').on('click', function(){
        $('#askSucculentName').change(function(){
            $('#searchbarSucculent').show();
        
        $.ajax({
            url: 'ptList.json',
			type: 'GET',
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
        });
        $('#ifSucculent').click(function(){
            $('#uploadSucculentPhoto').show();

    });
});
});
*/

