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


function tozalash(){
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

$(document).ready(function(){
    
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

        var soni = $("#cardSoni").text();
        var soni2 = parseInt(soni)+1;
        $("#cardSoni").text(soni2);
        $("#cardSoni2").text(soni2);

        var  sum = $(this).data("sum");
        var item = $("#sumCard1").text();
        var itemplus = parseInt(item)+sum;
        $("#sumCard1").text(itemplus);
        $("#sumCard2").text(itemplus);


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

  $(".addcardgroup").click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var soni = $('#soni').val();


    var soni1 = $("#cardSoni").text();
    var soni2 = parseInt(soni1)+1;
    $("#cardSoni").text(soni2);
    $("#cardSoni2").text(soni2);

    var  sum = $(this).data("sum");
    var item = $("#sumCard1").text();
    var itemplus = parseInt(item)+sum*soni;
    $("#sumCard1").text(itemplus);
    $("#sumCard2").text(itemplus);

    $.ajax({
        data: {id: id,soni: soni},
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


  $("#comentsbutton").click(function(){
      let id = $(this).data('id');
        $.ajax({
            url: "/blog/coments",
            data: {id:id},
            type: "GET",
            success: function(data){
                $(".comentsbody").html(data);
                $("#modalcoments").modal();
            },
            error: function(){
                alert("Xatolik yuz berdi");
            }
        });
  });



});