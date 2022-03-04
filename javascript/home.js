var listSanpham ;

function init(json_products){
  listSanpham = JSON.parse(json_products);
  display(listSanpham );
    // document.getElementById("demo").innerHTML = products.length;
}
function display(listSanpham ) {
    listSanpham.forEach(SP => {
        productcc = `
        <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-product" style="width:270px">
            <img class="card-img-top"  src="${SP.product_img}" alt="Card image" style="width:100%; height: 300px;">
                <div class="card-body">
                    <h4 class="card-title" style = 'font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;'id="name">${SP.product_name}</h4>
                    <p class="card-text" id="author"> Tác giả: ${SP.product_author}</p>
                    <p class="card-text" style="color:red" id="price">Giá: ${parseInt(SP.product_cost)} VNĐ</p>
                    <button class="add-to-card  btn btn-danger"  onclick="addToCartModal(this.id);" 
                                            id = "${SP.product_id} " > Thêm vào giỏ hàng </button>
                </div>
            </div>
        </div> 
    `;
    document.getElementById("list-product").innerHTML += productcc;
    document.getElementById("");
    });  
}

// Tìm kiếm sản phẩm
function Search(){
    document.getElementById("helo").innerHTML = `Hello AE`;
    // document.getElementById("list-product").innerHTML='';
    // let input = document.getElementById(`search-value`).value;
    // let listSearch = [];
    // let k = 0;
    // if(input == '') {
    // }    
    // else{
    //     for (let i = 0; i <listSanpham.length; i++) {//for
    //         const element = listSanpham[i];
    //         document.getElementById("allPr").innerHTML = element.product_name;
        //     if (element.product_name.toLowerCase().includes(input.toLowerCase())){
        //         listSearch.push(element);
        //         k++;
        //     } 
        //     if (element.product_author.toLowerCase().includes(input.toLowerCase())){
        //         listSearch.push(element);
        //         k++;
        //     }             
        // }
        // if(k>0) {
        //     document.getElementById("allPr").innerHTML = `Tìm thấy ${k} sản phẩm với từ khóa "${input}"!`;
        //     display(listSearch);
        // }
        // else{
        //     document.getElementById("allPr").innerHTML = `Không tìm thấy sản phẩm nào `;
        // }
    // }
}

//Hiển thị sản phẩm 


function addToCartModal(thisID){ 
    $('#myModal').modal('show');
    // document.getElementById("title").innerHTML=thisID;
    for (let index = 0; index < listSanpham.length; index++) {
        const SP = listSanpham[index];
        
        if(parseInt(SP.product_id) == thisID ){
            document.getElementById("ma-sach").innerHTML=SP.product_id ;
            document.getElementById("title").innerHTML=SP.product_name;
            document.getElementById("tac-gia").innerHTML = SP.product_author;
            document.getElementById("gia-thanh").innerHTML =  SP.product_cost ;
            document.getElementById("thanh-tien").innerHTML = SP.product_cost;
            let html = `
                 <img src="${SP.product_img}" style="width: 150px;" alt="">
            `;
            document.getElementById("img-modal").innerHTML = html;
        }
    }
    
}


function sum(){
    let k = document.getElementById("input-sl").value;
    document.getElementById("thanh-tien").innerHTML =  k*document.getElementById("gia-thanh").innerHTML ;
}
//Tạo ra đối tượng trong một giỏ hàng
var keyLocalStorage = 'Cart-item';
function itemInCart(id,name,amount,cost,image){
    var cartItem = new Object();
    cartItem.id = id;
    cartItem.name = name;
    cartItem.amount = amount;
    cartItem.cost = cost;
    cartItem.image = image;
    return cartItem;
} 
// JSON mảng từ String và lấy ra chuỗi từ LocalStorage
function getListItemInCart(){
    var listItemInCart = new Array();
    var jsonListItemInCart = localStorage.getItem(keyLocalStorage);
    if(jsonListItemInCart!=null)
        listItemInCart = JSON.parse(jsonListItemInCart);
    return listItemInCart;
}
//Dùng JSON toString() mảng và lưu vào LocalStorage
function saveToLocalStorage(listItemInCart){
    var jsonListItemInCart = JSON.stringify(listItemInCart);
    localStorage.setItem(keyLocalStorage, jsonListItemInCart);
}

function SaveBtn(){
    
    var id = document.getElementById("ma-sach").innerHTML; // mã sách trên Modal
    id = parseInt(id);
    for (let index = 0; index < listSanpham.length; index++) {
        const book = listSanpham[index];
       
        if(parseInt(id) == parseInt(book.product_id)){
            var img = book.product_img;}
    }
    var TenSach = document.getElementById("title").innerHTML;; // Têm sách
    var soLuong =  document.getElementById("input-sl").value; //Số lượng
    var Gia = document.getElementById("thanh-tien").innerHTML;
    // var img = 'Hleo';
    let listItemInCart =  getListItemInCart(); // Khởi tạo chuỗi

    var item = itemInCart(id,TenSach,soLuong,Gia,img);//Tạo một book từ các thuộc tính trên màn hình
    var isExist = false;
    
    for (let index = 0; index < listItemInCart.length; index++) {
        const book = listItemInCart[index];
        if(parseInt(id) == parseInt(book.id)){
            // document.getElementById('demo').innerHTML="VCL";
            let sumAmount = parseInt(listItemInCart[index].amount) + parseInt(soLuong);
            listItemInCart[index].amount = sumAmount;
            let sumPrice = sumAmount * parseInt(Gia);
            listItemInCart[index].cost = sumPrice;
            isExist = true;
        }
    }
    if(isExist==false){
        listItemInCart.push(item);
    }
    saveToLocalStorage(listItemInCart);
    muaTC();    
}
function dem(str){
    document.getElementById('te').innerHTML = str.length
}
function muaTC(){
    $('#myModalBuyComplete').modal('show');
    $('#myModal').modal('hide');

}


        