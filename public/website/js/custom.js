// Owl Carousel Start..................



$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});








// Owl Carousel End..................

//confirm button click to send
$('#contactConfirm').click(function(){
    var Name=$('#contactName').val();
    var phone=$('#contactPhone').val();
    var email=$('#contactEmail').val();
    var msg=$('#contactMsg').val();
    sendContact(Name,email,phone,msg);
})
//send contact information
function sendContact(Name,email,phone,msg){
    if(Name.length==0){
        $('#contactName').css('border-color','red')
        $('#name').html('This Field is required')
        setTimeout(function() {
            $('#name').html('')
        }, 3000);
        
    }else if(phone.length==0){
        $('#contactPhone').css('border-color','red')
        $('.phone').html('This Field is Required')
        setTimeout(function() {
            $('.phone').html('')
        }, 3000);
    }else if(email.length==0){
        $('#contactEmail').css('border-color','red')
        $('.email').html('This Field is Required')
        setTimeout(function() {
            $('.email').html('')
        }, 3000);
    }else if(msg.length==0){
        $('#contactMsg').css('border-color','red')
        $('.msg').html('This Field is Required')
        setTimeout(function() {
            $('.msg').html('')
        }, 3000);
    }else{
        $('#contactConfirm').html('অনুরোধ  সম্পূর্ণ  হয়েছে')
        axios.post('/contactmsg',{
            name:Name,
            email:email,
            phone:phone,
            msg:msg,
        })
        .then(function(response){
            if(response.data==1){
                $('#contactConfirm').addClass('bg-success').html('অনুরোধ  সম্পূর্ণ  হয়েছে')
                $('#contactName').val('');
                $('#contactPhone').val('');
                $('#contactEmail').val('');
                $('#contactMsg').val('');
                setTimeout(function() {
                    $('#contactConfirm').html('পাঠিয়ে দিন ').removeClass('bg-success')
                }, 3000);
                
            }else{
                setTimeout(function() {
                    $('#contactConfirm').html('অনুরোধ  ব্যর্থ  হয়েছে')
                }, 3000);
            }
        })
        .catch(function(error){
            alert('Custom Error')
        })
    }
    
}