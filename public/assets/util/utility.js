document.addEventListener('DOMContentLoaded', function(e){
    let mobileMenu = document.querySelector('#mobile-demo');
    let carous = document.querySelector('#caro1');
    let sideNavShow = document.querySelector('#sideNavShow');
    let mySideNav = document.querySelector('#slide-out');
    let allDeleteBtn = document.querySelectorAll('.deleteBtn');
    let deleteModal = document.querySelector('#deleteModal');

    $('#categoryTable').DataTable();
    M.AutoInit();

    M.Sidenav.init(mobileMenu, {edge: "right"});
    allDeleteBtn && deleteFxn();
    // M.Sidenav.init(mySideNav, {inDuration: 500, outDuration: 500});
    M.Carousel.init(carous, {fullWidth: true, indicators: true});

    carous && setInterval(() => {
        M.Carousel.getInstance(carous).next()
    }, 5000)

    sideNavShow && sideNavShow.addEventListener('click', function(e){
        // console.log('clickdd')
        // e.preventDefault();
        let navInst = M.Sidenav.getInstance(mySideNav, {inDuration: 500, outDuration: 500});
        if(document.body.classList.contains('padSide')){
            console.log('padded');
            document.body.classList.toggle('padSide')
            navInst.close();
        } else {
            document.body.classList.toggle('padSide')
            navInst.open();
            console.log('Not Padded')
        }
    })

    /******HANDLE CATEGORY SECTION***** */
    let categoryModal = document.querySelector('#categoryModal');
    let categoryModalBtn = document.querySelector('#categoryModalBtn');
    let categoryForm = document.querySelector('#categoryForm');

    categoryModalBtn && categoryModalBtn.addEventListener('click', function(){
        M.Modal.getInstance(categoryModal).open()
    })

    categoryForm && categoryForm.addEventListener('submit', function(e){
        e.preventDefault();

        let validForm = true;
        let formVal = new FormData(categoryForm);
        for(let val of formVal.values()){
            if(val.trim() == ''){
                validForm = false;
            }
        }
        if(!validForm){
            categoryForm.querySelector('#errorText').classList.remove('hide');
            return;
        }
        categoryForm.querySelector('#errorText').classList.add('hide');
        categoryModal.querySelector('.progress').classList.remove('hide');

        AJAXJS(formVal, 'POST', '/categories/new', (res) => {
            categoryModal.querySelector('.progress').classList.add('hide');
            console.log(res);
            if(res.exists){
                M.toast({html:"<h5>Category already exists</h5>", classes:"red"});
            } else if(res.success){
                M.toast({html:"<h5>Category created successfully</h5>", classes:"green"});
                categoryForm.querySelector('#name').value = '';
                categoryForm.querySelector('#description').value = '';
                let categoryTable = document.querySelector('#categoryTable');

                let newRow = categoryTable.insertRow();
                newRow.setAttribute('id', `row${res.cat.id}`)
                newRow.innerHTML = `
                    <td>${res.cat.id}</td>
                    <td>${res.cat.name}</td>
                    <td>${res.cat.description}</td>
                    <td>
                        <button class="btn-floating red deleteBtn" 
                            data-type="category"  data-table="categoryTable" data-id="${res.cat.id}" title="Delete">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                `
                deleteFxn();
                M.Modal.getInstance(categoryModal).close()
            } else{
                M.toast({html:"<h5>Category creation failed</h5>", classes:"red"});
            }
        })
    })

    function deleteFxn(){
        document.querySelectorAll('.deleteBtn').forEach(btn => {
            btn.addEventListener('click', function(e){
                e.preventDefault();
                let deleteModal = document.querySelector('#deleteModal');
                deleteModal.setAttribute('data-id', btn.dataset.id);
                deleteModal.setAttribute('data-type', btn.dataset.type);
                deleteModal.setAttribute('data-table', btn.dataset.table);
                M.Modal.getInstance(deleteModal).open();

            })
        })
    }

    deleteModal && deleteModal.querySelector('#yes').addEventListener('click', (e) => {
        e.preventDefault();
        let deleteTable = deleteModal.dataset.table;
        let deleteObj = {
            id: deleteModal.dataset.id,
            type: deleteModal.dataset.type,
        };
        let successFxn = (res)=>{
            deleteModal.querySelector('.progress').classList.add('hide');
            if(res.success){
                M.toast({html:"<h5>Deleted successfully</h5>", classes:"green"});
                M.Modal.getInstance(deleteModal).close();
                let delRow = document.querySelector('#'+deleteTable+' #row'+deleteObj.id);
                let delTable = document.querySelector('#'+deleteTable);
                delTable.deleteRow(delRow.rowIndex);
            }
        };

        deleteModal.querySelector('.progress').classList.remove('hide');

        if(deleteObj.type == "category"){
            AJAXJS(deleteObj, 'POST', '/category/delete', successFxn, true)
        } else if(deleteObj.type == "product"){
            AJAXJS(deleteObj, 'POST', '/product/delete', successFxn, true)
        }
        
    })

    deleteModal && deleteModal.querySelector('#no').addEventListener('click', (e) => {
        M.Modal.getInstance(deleteModal).close();
    })


})






/*****************AJAX FUNCTION TO SELECT THE UNSYNCED TABLE DATA FROM DB****************** */
function AJAXJS(sendObj, actionMET, actionURL, successFxn, isJson = false){
    let aj = new XMLHttpRequest();
    aj.open(actionMET, actionURL);
    aj.onload = ()=>{
        if(aj.status == 200){
            let returnObj = JSON.parse(aj.responseText);
            // console.log(returnObj);
            successFxn(returnObj);
        } else {
            document.querySelector('.progress').classList.add('hide');
            M.toast({html: "<h5>Error! Please Contact Admin</h5>", classes: "red"}, 4000);
        }
    };
    // aj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    if(isJson){
        aj.setRequestHeader('Content-Type', 'application/json');
        sendObj = JSON.stringify(sendObj);
    }
    aj.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    
    // aj.send(JSON.stringify(sendObj));
    aj.send(sendObj);
}
/*************END OF AJAX************** */