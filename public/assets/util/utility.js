document.addEventListener('DOMContentLoaded', function(e){
    let mobileMenu = document.querySelector('#mobile-demo');
    let carous = document.querySelector('#caro1');
    let sideNavShow = document.querySelector('#sideNavShow');
    let mySideNav = document.querySelector('#slide-out');
    let allDeleteBtn = document.querySelectorAll('.deleteBtn');
    let deleteModal = document.querySelector('#deleteModal');

    $('#categoryTable').DataTable();
    $('#productTable').DataTable();
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

    
    /******HANDLE PRODUCT SECTION***** */
    let productModal = document.querySelector('#productModal');
    let productModalBtn = document.querySelector('#productModalBtn');
    let productForm = document.querySelector('#productForm');

    productModalBtn && productModalBtn.addEventListener('click', function(){
        M.Modal.getInstance(productModal).open()
    })

    productForm && productForm.addEventListener('submit', function(e){
        e.preventDefault();

        let validForm = true;
        let formVal = new FormData(productForm);
        for(let val of formVal.values()){
            if(val.trim() == ''){
                validForm = false;
            }
        }
        if(!validForm){
            productForm.querySelector('#errorText').classList.remove('hide');
            return;
        }
        productForm.querySelector('#errorText').classList.add('hide');
        productModal.querySelector('.progress').classList.remove('hide');

        AJAXJS(formVal, 'POST', '/product/new', (res) => {
            productModal.querySelector('.progress').classList.add('hide');
            console.log(res);
            if(res.exists){
                M.toast({html:"<h5>Product already exists</h5>", classes:"red"});
            } else if(res.success){
                M.toast({html:"<h5>Product created successfully</h5>", classes:"green"});
                productForm.querySelector('#name').value = '';
                productForm.querySelector('#price').value = '';
                let productTable = document.querySelector('#productTable');

                let newRow = productTable.insertRow();
                newRow.setAttribute('id', `row${res.prod.id}`)
                newRow.innerHTML = `
                    <td>${res.prod.id}</td>
                    <td>${res.prod.name}</td>
                    <td>${res.prod.quantity ?? 0}</td>
                    <td>${res.prod.unit}</td>
                    <td>${(+res.prod.current_price).toFixed(2)}</td>
                    <td>
                        <button class="btn-floating red deleteBtn" 
                            data-type="product"  data-table="productTable" data-id="${res.prod.id}" title="Delete">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                `
                deleteFxn();
                M.Modal.getInstance(productModal).close()
            } else{
                M.toast({html:"<h5>Product creation failed</h5>", classes:"red"});
            }
        })
    })


    // HANDLE PURCHASE SECTION
    let productSubmitBtn = document.querySelector('#productSubmitBtn');
    let productsArr = [];
    let purchaseModalBtn = document.querySelector('#purchaseModalBtn');
    let purchaseForm = document.querySelector('#purchaseForm');

    purchaseModalBtn && purchaseModalBtn.addEventListener('click', function(){
        M.Modal.getInstance(purchaseModal).open()
    })

    purchaseForm && purchaseForm.addEventListener('submit', function(e){
        e.preventDefault();

        let validForm = true;
        let formVal = new FormData(purchaseForm);
        for(let val of formVal.values()){
            if(val.trim() == ''){
                validForm = false;
            }
        }
        if(!validForm){
            purchaseForm.querySelector('#errorText').classList.remove('hide');
            return;
        }
        purchaseForm.querySelector('#errorText').classList.add('hide');
        
        let prodName = purchaseForm.querySelector('#name').selectedOptions[0].textContent.trim();
        let prodId = purchaseForm.querySelector('#name').value;
        let prodQty = purchaseForm.querySelector('#quantity').value;
        let prodCost = purchaseForm.querySelector('#cost').value;
        let prodPrice = purchaseForm.querySelector('#price').value;
        let purchaseTable = document.querySelector('#purchaseTable');

        productsArr.push({prodId, prodQty, prodCost, prodPrice})

        purchaseForm.querySelector('#quantity').value = '';
        purchaseForm.querySelector('#cost').value = '';
        purchaseForm.querySelector('#price').value = '';

        let newRow = purchaseTable.insertRow();
        // newRow.setAttribute('id', `row${res.prod.id}`)
        newRow.innerHTML = `
            <td>${prodId}</td>
            <td>${prodName}</td>
            <td>${prodQty}</td>
            <td>${prodCost}</td>
            <td>${(+prodPrice).toFixed(2)}</td>
        `
        M.Modal.getInstance(purchaseModal).close()
            
    });

    productSubmitBtn && productSubmitBtn.addEventListener('click', function(e){
        e.preventDefault();

        if(productsArr.length < 1){
            alert('No products selected!');
            return;
        }
        document.querySelector('.progress').classList.remove('hide')
        productSubmitBtn.setAttribute('disabled', true);
        AJAXJS(productsArr, 'POST', '/purchase/store', (res) => {
            document.querySelector('.progress').classList.add('hide')
            if(res.success){
                M.toast({html: "<h5>Purchases successfully registered!</h5>", classes:"green"})
            }
            console.log(res)
        }, true)
    })


    // HANDLE REPORTS SECTION
    // purchase
    let purchaseMonthBtn = document.querySelector('#purchaseMonthBtn');
    let purchaseDayBtn = document.querySelector('#purchaseDayBtn');

    purchaseMonthBtn && purchaseMonthBtn.addEventListener('click', function(e){
        e.preventDefault();
        let purchaseMonth = document.querySelector('#purchaseMonth').value;

        if(purchaseMonth == ''){
            alert('Please select a month');
            return;
        }
        document.querySelector('.progress').classList.remove('hide')

        AJAXJS({purchaseMonth}, 'POST', '/reports/purchase/month', purchaseReport, true);
    })
    
    purchaseDayBtn && purchaseDayBtn.addEventListener('click', function(e){
        e.preventDefault();
        let purchaseDay = document.querySelector('#purchaseDay').value;

        if(purchaseDay == ''){
            alert('Please select a Day');
            return;
        }
        document.querySelector('.progress').classList.remove('hide')

        AJAXJS({purchaseDay}, 'POST', '/reports/purchase/day', purchaseReport, true);
    })

    function purchaseReport(res){
        let purchaseReportTable = document.querySelector('#purchaseReportsTable');
        document.querySelector('.progress').classList.add('hide')

        if(res.products.length > 0){
            let reportBody = '';
            let totalPrice = 0;
            res.products.forEach(prod => {
                let prodTotal = (+prod.unit_cost) * (+prod.quantity);
                totalPrice += prodTotal;
                reportBody += `
                    <tr>
                        <td>${prod.item_id}</td>
                        <td>${prod.name}</td>
                        <td>${prod.unit_cost}</td>
                        <td>${prod.quantity}</td>
                        <td>${prodTotal}</td>
                    <tr>
                `
            })

            purchaseReportTable.querySelector('tbody').innerHTML = reportBody;
            document.querySelector('#reportDate').innerHTML = res.date;
            document.querySelector('#purchaseReports').classList.remove('hide')
        } else {
            M.toast({html: "<h5>No Purchase on this Date!</h5>", classes:"green"})
        }
    }
    
    
    // sale
    let saleMonthBtn = document.querySelector('#saleMonthBtn');
    let saleDayBtn = document.querySelector('#saleDayBtn');

    saleMonthBtn && saleMonthBtn.addEventListener('click', function(e){
        e.preventDefault();
        let saleMonth = document.querySelector('#saleMonth').value;

        if(saleMonth == ''){
            alert('Please select a month');
            return;
        }
        document.querySelector('.progress').classList.remove('hide')

        AJAXJS({saleMonth}, 'POST', '/reports/sale/month', saleReport, true);
    })
    
    saleDayBtn && saleDayBtn.addEventListener('click', function(e){
        e.preventDefault();
        let saleDay = document.querySelector('#saleDay').value;

        if(saleDay == ''){
            alert('Please select a Day');
            return;
        }
        document.querySelector('.progress').classList.remove('hide')

        AJAXJS({saleDay}, 'POST', '/reports/sale/day', saleReport, true);
    })

    function saleReport(res){
        let saleReportTable = document.querySelector('#saleReportsTable');
        document.querySelector('.progress').classList.add('hide')

        if(res.products.length > 0){
            let reportBody = '';
            let totalPrice = 0;
            res.products.forEach(prod => {
                let prodTotal = (+prod.unit_price) * (+prod.quantity);
                totalPrice += prodTotal;
                reportBody += `
                    <tr>
                        <td>${prod.item_id}</td>
                        <td>${prod.name}</td>
                        <td>${prod.unit_price}</td>
                        <td>${prod.quantity}</td>
                        <td>${prodTotal}</td>
                    <tr>
                `
            })

            saleReportTable.querySelector('tbody').innerHTML = reportBody;
            document.querySelector('#reportDate').innerHTML = res.date;
            document.querySelector('#saleReports').classList.remove('hide')
        } else {
            M.toast({html: "<h5>No Sale on this Date!</h5>", classes:"green"})
        }
    }

    // HANDLE SALES SECTION
    let addInvoiceBtn = document.querySelector('#addInvoiceBtn');
    let saleSubmitBtn = document.querySelector('#saleSubmitBtn');

    addInvoiceBtn && addInvoiceBtn.addEventListener('click', function(){
        let chooseProduct = document.querySelector('#chooseProduct');
        let invoice =  document.querySelector('#invoice tbody');
        let qty = document.querySelector('#quantity').value;
        let prodQty = +chooseProduct.selectedOptions[0].dataset.quantity;

        if(qty == '' || chooseProduct.value == ''){
             alert('Please select product and quantity!')
            return;
        }
        if(qty > prodQty){
            alert('Insufficient Stock!');
            return;
        }
        
        if(document.querySelector(`#prod${chooseProduct.value}`)){
            alert('Product already in cart!');
            return;
        }

        let prodName = chooseProduct.selectedOptions[0].dataset.name;
        let prodUnit = chooseProduct.selectedOptions[0].dataset.unit;
        let prodPrice = chooseProduct.selectedOptions[0].dataset.price;
        let total = (+prodPrice) * (+qty)
        let newRow = invoice.insertRow();

        newRow.setAttribute('id', `prod${chooseProduct.value}`)
        newRow.setAttribute('data-id', chooseProduct.value)
        newRow.setAttribute('data-qty', qty)
        newRow.setAttribute('data-price', prodPrice)
        newRow.innerHTML = `
            <td>${prodName}</td>
            <td>${qty}</td>
            <td>${prodUnit}</td>
            <td>${prodPrice}</td>
            <td>${(+total).toFixed(2)}</td>
        `

        let currTotal = +document.querySelector('#totalCell').innerHTML;
        document.querySelector('#invoice #totalCell').innerHTML = (currTotal + total).toFixed(2)
    });


    saleSubmitBtn && saleSubmitBtn.addEventListener('click', function(e){
        e.preventDefault();
        let prodRows = document.querySelectorAll('#invoice tbody tr');
        let prodArr = [];
        if(prodRows.length < 1){
            alert('No products selected!');
            return;
        }

        prodRows.forEach(rw => {
            let prod = {
                id: rw.dataset.id,
                quantity: rw.dataset.qty,
                price: rw.dataset.price};
            prodArr.push(prod);
        });
        saleSubmitBtn.setAttribute('disabled', true);
        document.querySelector('.progress').classList.remove('hide')

        AJAXJS(prodArr, 'POST', '/sales/store', (res)=>{
            document.querySelector('.progress').classList.add('hide')
            if(res.success){
                M.toast({html: "<h5>Sales Completed Successsfully!</h5>", classes:"green"})
                document.querySelectorAll('#invoice tbody').innerHTML = '';
                saleSubmitBtn.removeAttribute('disabled');
            }
        }, true)


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