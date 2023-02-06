


function formsubmit() {

    var user = document.getElementById('user').value;
    var pwd = document.getElementById('pwd').value;
    //store all the submitted data in astring.
    var formdata = '&user=' + user  + '&pwd=' + pwd;
   
    
    if (user == '') {
        alert("Please Enter Email id");
        return false;
    }
 
    if (pwd == '') {
        alert("Please Enter Password");
        return false;
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "src/login.php", //call storeemdata.php to store form data
            data: formdata,
            cache: false,
            success: function (html) {
                alert(html);
                
            }
        });
    }
    return false;
}