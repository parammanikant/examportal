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

function searchClasses(searchText){
    
    $.ajax({
        url : "http://localhost/exportal/searchclasses.php",
        data : {
            search_by : searchText
        },
        async :  false,
        method : 'POST',
        success : function(res){
            document.getElementById('dybnamic-rows').innerHTML = res;
        },
        error : function(error){

        }
    })

}

function deleteClass(id){
    let cnf = confirm("Are you sure?");

    if(cnf == true){
        window.location.href = `deleteClass.php?id=${id}`;
    }
}