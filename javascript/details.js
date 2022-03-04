function displayDetails(){
    for (let index = 0; index < details.length; index++) {
        const detail = details[index];
        let html =`
            <tr>
                <td style="padding-top:20px"> ${detail.product_id}</td>
                <td style="padding-top:20px">${detail.product_name}</td>
                <td style="padding-top:20px"> <input  style="width : 50px" id="${detail.product_id}" value="${detail.cart_amount}" type="number" min="1" > </input></td>
                <td style="padding-top:20px">${detail.product_cost} VNĐ</td>
                <td style="padding-top:20px"> ${detail.total} VNĐ</td>
                <td style="padding-top:20px"><img src="${detail.product_img}" alt="Sản phẩm 1" class="img-responsive" width="50"> </td>
                <td style="padding-top:20px"> <button class="btn-success" onclick="updateQuantity(${detail.product_id},${id})"> Cập nhật </button>  </td>
            </tr>
    `
    document.getElementById("DS").innerHTML += html;
    }
}
displayDetails();
function updateQuantity(product_id,bill_id){
    var newValue = document.getElementById(`${product_id}`).value;
    request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           alert ("Cập nhật thành công");
        }
    };
    request.open("POST", "index.php?controller=cart&action=update",true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(`newValue=${newValue}&product_id=${product_id}&bill_id=${bill_id}`);
    location.reload();
}