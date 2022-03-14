function show(data){
    $('.modalcontent').html(data);
    $('#MyModal').modal();
}


function del(id){
    $.ajax({
        data: {id: id},
        type: 'get',
        url: '/card/delitem',
        success:function(data){
            show(data);
        },
        error: function(data){
            console.log('xatolik');
        },
    });
}


function tozalash(e){
    e.preventDefault();
    $.ajax({
        type: 'get',
        url: '/card/clear',
        success:function(data){
            show(data);
        },
        error: function(data){
            console.log(data);
        },
    });  
}

$(".clear").click(function(e){
    e.preventDefault();
  });


$(".show").click(function(e){
    e.preventDefault();
    $.ajax({
        type: 'get',
        url: '/card/show',
        success:function(data){
            show(data);
        },
        error: function(data){
            console.log(data);
        },
    });  
  });



$(".addcard").click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        data: {id: id},
        type: 'get',
        url: '/card/add',
        success:function(data){
            // console.log(data);
            show(data);
        },
        error: function(data){
            console.log(data);
        },
    });

    
  });

