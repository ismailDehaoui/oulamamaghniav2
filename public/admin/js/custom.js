$(document).ready(function(){

    // call datatable class
    $('#teachers').DataTable();
    $('#categories').DataTable();
    $('#schools').DataTable();
    $('#parents').DataTable();
    $('#students').DataTable();
    $('#subscription').DataTable();


    $(".nav-item").removeClass("active");
    $(".nav-link").removeClass("active");

    // Check Admin Password is correct or not
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        // alert(current_password);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/admin/check-admin-password",
            data: {current_password: current_password},
            success: function(resp){
               //alert(resp);
                if(resp == "false"){
                    $("#check_password").html("<font color='red'> Curent Password is Incorrect! </font>");
                }else if(resp == "true"){
                    $("#check_password").html("<font color='green'> Curent Password Correct! </font>");
                }
            }, error: function(){
                alert('Error');
            }
            
        });
    })
    
    $(document).on("click","updateQuranTeacherStatus", function(){
        var status = $(this).children("i").attr('status');
        var teacher_id = $(this).attr("teacher_id");
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:"/admin/update-teacher-status",
            data: {status:status,teacher_id:teacher_id} ,
            success:function(resp){
                if(resp['status'] == 0){
                    $("#teacher-"+teacher_id).html("<i style='font-size:25px; class='mdi mdi-bookmark-outline'></i>");
                }else if(resp['status'] ==1)
                    $("#teacher-"+teacher_id).html("<i style='font-size:25px; class='mdi mdi-bookmark-check'></i>");
            },error:function(){
                alert("Error");
            } 
        })
    });
});

function toggleInput() {
    var yesOption = document.getElementById('yesOption');
    var typeDisease = document.getElementById('typeDisease');
  
    if (yesOption.checked) {
        typeDisease.style.display = 'block';
    } else {
        typeDisease.style.display = 'none';
    }
  }

 function toggleInputPrice(){
    var yesOptionDate = document.getElementById('yesOptionDate');
    var pric_of_subcription = document.getElementById('pric_of_subcription'); 
  
    if (yesOptionDate.checked) {
        pric_of_subcription.style.display = 'none';
     
    } else {
        pric_of_subcription.style.display = 'block';
        
    }

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(document).ready(function() {
        $('.delete-btn').on('click', function() {
            // Get the member ID from the data attribute
            var memberId = $(this).data('member-id');
    
            // Confirm deletion with the user
            if (confirm('Are you sure you want to delete this member?')) {
                // AJAX request to delete the member
                $.ajax({
                    url: '/delete-member/' + memberId, // Replace with your route
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token
                    },
                    success: function(response) {
                        // Handle success (if needed)
                        console.log('Member deleted successfully');
                        // Remove the member from the UI
                        $(`.delete-btn[data-member-id="${memberId}"]`).closest('.member')
                            .remove();
                    },
                    error: function(error) {
                        // Handle error (if needed)
                        console.error('Error deleting member', error);
                    }
                });
            }
        });
    });
    
 } 

 $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
  
 $(document).ready(function() {
    $('.delete-btn').on('click', function() {
        // Get the member ID from the data attribute
        var memberId = $(this).data('member-id');

        // Confirm deletion with the user
        if (confirm('Are you sure you want to delete this member?')) {
            // AJAX request to delete the member
            $.ajax({
                url: '/delete-member/' + memberId, // Replace with your route
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Include CSRF token
                },
                success: function(response) {
                    // Handle success (if needed)
                    console.log('Member deleted successfully');
                    // Remove the member from the UI
                    $(`.delete-btn[data-member-id="${memberId}"]`).closest('.member')
                        .remove();
                },
                error: function(error) {
                    // Handle error (if needed)
                    console.error('Error deleting member', error);
                }
            });
        }
    });
});

function updateCurrentDate() {
    // احصل على العنصر الذي يعرض التاريخ
    const currentDateDisplay = document.getElementById('currentDateDisplay');

    // إنشاء كائن Date للحصول على التاريخ الحالي
    const currentDate = new Date();

    // تحديث نص التاريخ في العنصر بتنسيق معين
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    const formattedDate = currentDate.toLocaleDateString('en-US', options);
    currentDateDisplay.textContent = `Today (${formattedDate})`;
}
