let keyLocalStorageCart = 'Cart-item';
let keyLocalStorageProduct = 'Product-item';

function getListItem(keyLocalStorageCart) {
    var listItemInCart = new Array();
    var jsonListItemInCart = localStorage.getItem(keyLocalStorageCart);
    if (jsonListItemInCart != null)
        listItemInCart = JSON.parse(jsonListItemInCart);
    return listItemInCart;
}
let listProduct = getListItem(keyLocalStorageProduct);
let listBookOnCart = getListItem(keyLocalStorageCart);// lấy ra mảng ra từ local
if(listBookOnCart.length == 0 ){
    document.getElementById("Title-Cart").innerHTML = "Không có sản phẩm nào trong giỏ hàng";
}
function displayCartItem() {
    document.getElementById("list-book").innerHTML ='';
    for (let index = 0; index < listBookOnCart.length; index++) {
        const element = listBookOnCart[index];
        let item = `
                            <tr> 
                            <td data-th="Product" class="text-center" style="margin-top : 40px"> 
                                <div class="row"> 
                                <div class="col-sm-2 hidden-xs" id="image-book"> <img src="${element.image}" alt="Sản phẩm 1" class="img-responsive" width="100">             
                                </div> 
                            <td>
                                <div class="col-sm-10"> 
                                <h4 class="text-center" name ="Name" class="nomargin" style="margin-top : 40px">${element.name}</h4>  
                                </div> </td>
                            </td> 
                            <td data-th="Price"  class="text-center">
                                <p  style="margin-top:40px"  name ="Cost"> ${parseInt(element.cost).toLocaleString()} đ </p>
                            </td> 
                            <td data-th="Quantity"  class="text-center"> 
                                <input  style="margin-top :35px" name = "Amount" class="form-control text-center" min="1" id="amount${element.id}" value="${element.amount}" type="number" onchange = "changeNumber()" >
                            </td> 
                            <td data-th="Subtotal" class="text-center">
                                <p style="margin-top : 40px"> ${parseInt(element.cost).toLocaleString()} đ </p>
                            </td> 
                            <td class="actions" data-th="">
                                <button id="${element.id}" type ="summit" name="Them " onclick="deletePr(this.id)" style="margin-top : 40px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                </button>
                            </td> 
                        </tr> 
         `;
        document.getElementById("list-book").innerHTML += item;
    }
}
displayCartItem();
function displayKH(){
    document.getElementById("khach-hang").innerHTML=` 
    <table id="info">
        <tr> 
            <td> <label style ="font-weight : bolder" for="">Tên khách hàng</label></td>
            <td> <input type="text" id="name"   ></td>
        </tr>
        <tr> 
        <td> <label style ="font-weight : bolder"  for="">Địa chỉ nhận hàng</label></td>
            <td> <input type="text" id="address" ></td>
        </tr>
        
        <tr> 
        <td> <label style ="font-weight : bolder"    for="">Số điện thoại</label></td>
            <td> <input type="text" id="phone" ></td>
            
        </tr>
     </table>   
    `
}
displayKH();
function SumAmount() {
    let sum = 0;
    for (let index = 0; index < listBookOnCart.length; index++) {
        const book = listBookOnCart[index];
        sum += parseInt(book.cost);
    }

    document.getElementById("thanh-tien").innerHTML = sum.toLocaleString() + ' đ';
    // let html1 = `Giỏ hàng của bạn (${listBookOnCart.length} sản phẩm)`;
}
SumAmount();
// document.getElementById('Title-Cart').innerHTML = html1;
function saveToLocalStorage(listItemInCart, keyLocal) {
    var jsonListItemInCart = JSON.stringify(listItemInCart);
    localStorage.setItem(keyLocal, jsonListItemInCart);
}

function deletePr(ID) {
    for (let index = 0; index < listBookOnCart.length; index++) {
        const element = listBookOnCart[index];
        if (element.id == ID) {
            listBookOnCart.splice(index, 1);
            saveToLocalStorage(listBookOnCart, keyLocalStorageCart);
        }
    }
    SumAmount();
    displayCartItem();
}


function changeAmount(ID,SL){
    for (let index = 0; index < listBookOnCart.length; index++) {
        const element = listBookOnCart[index];
        if (element.id == ID) {
            
        }       
    }
}
function thanhToan(){
    listBookOnCart.length = 0;
    saveToLocalStorage(listBookOnCart, keyLocalStorageCart);   
    displayCartItem();
    document.getElementById("Title-Cart").innerHTML = "Thanh toán thành công";
    document.getElementById("thanh-tien").innerHTML=0;
}

function checkOut(){
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var str_json = localStorage.getItem(keyLocalStorageCart);
    
    // request.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         alert (this.responseText);
    //     }
    // };
    if(listBookOnCart.length = 0 || name !='' || address!='' || phone !='')
    {   
        request = new XMLHttpRequest();
        request.open("POST", "index.php?controller=cart&action=checkout",true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(`json=${str_json}&name=${name}&address=${address}&phone=${phone}`);
        thanhToan();
        alert("Thanh toán thành công");
    }
    else alert ("Bạn chưa có đơn hàng hoặc Chưa điền đầy đủ thông tin");
}
// function getDate(){
//     var date = new Date();
//     var str = reString(date.getHours())+":"+reString(date.getMinutes())
//     +" "+reString(date.getDay())+"-"+reString((date.getMonth()+1))+"-"+date.getFullYear();
//     return str;
// }
