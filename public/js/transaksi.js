$(document).on('click', '.pilih', function (e) {
    document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
    document.getElementById("buku_id").value = $(this).attr('data-buku_id');
    $('#myModal3').modal('hide');
}); 

    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<br><div class="col-md-5"><div class="input-group">';
    fieldHTML=fieldHTML + '<select class="form-control" id="data_buku" name="buku_id[]" required="">'
                                    + '@foreach($bukus as $data)'
                                        + '<option value="{{$data->id}}">{{$data->judul_buku}}</option>'
                                    + '@endforeach'
                                + '</select>'
                                + '<span class="input-group-btn">';
    fieldHTML=fieldHTML + '<a href="javascript:void(0);" class="remove_button btn btn-danger">Hapus</a>';
    fieldHTML=fieldHTML + '</span></div></div></div><br>'; 

    var x = 1; //Initial field counter is 1
     
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
     
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('').parent('').remove(); //Remove field html
        x--; //Decrement field counter
    });
});