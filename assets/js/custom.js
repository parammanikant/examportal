function deleteTeacher(teacher_id){

    let conf = confirm("Are You Sure You Want To Delete This teacher?");

    if(conf == false){
        return false;
    }

    $.ajax({
        url : "http://localhost/exportal/deleteteachers.php",
        method : "POST",
        data : {
            tid : teacher_id
        },
        success : function (resp){
            if(resp == 'Success') {
                location.reload();
            } else {
                alert("Error in deleting");
            }
        },
        error : function(err) {
            alert("Error in deleting");
        }
    })
}