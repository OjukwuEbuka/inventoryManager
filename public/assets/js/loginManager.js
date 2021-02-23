document.addEventListener('DOMContentLoaded', function(){

    let submitBtn = document.querySelector('#loginSubmit');

    /******************SUBMIT BUTTON ACTION FOR LOGIN ************************* */

    submitBtn && submitBtn.addEventListener('click', function(e){
        e.preventDefault();

        let loginObj = {
            uname: document.querySelector('#username').value,
            pword: document.querySelector('#password').value
        }

        console.log(loginObj)
        if(loginObj.uname === "" || loginObj.pword === ""){
            alert("Please fill in the username and password!");
            return;
        }

        AJAXJS(loginObj, 'POST', '/login/user', function(resp){
            if(resp.success){
                window.location.href = resp.location;
            }
            if(resp.error){
                M.toast({html: '<h5>The username or password is incorrect</h5>', classes: 'red rounded'}, 6000);
            }
        })

    })

})

/*****************AJAX FUNCTION TO SELECT THE CHOSEN CLASS, SESSION AND TERM FROM DB****************** */
function AJAXJS(formObj, actionMET, actionURL, successFxn){
    let aj = new XMLHttpRequest();
    aj.open(actionMET, actionURL);
    aj.onload = ()=>{
        if(aj.status == 200){
            let returnObj = JSON.parse(aj.responseText);
            // console.log(returnObj);
            successFxn(returnObj);
        }
    };
    aj.setRequestHeader('Content-Type', 'application/json');
    aj.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    aj.send(JSON.stringify(formObj));
}
/*************END OF AJAX************** */
