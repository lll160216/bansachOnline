function displayBill(){
    for (let index = 0; index < listBill.length; index++) {
        const bill = listBill[index];
        let html = `
            <tr>
                <td > ${bill.bill_id}</td>
                <td>${bill.name}</td>
                <td> Thanh toán khi nhận hàng </td>
                <td>${bill.address}</td>
                <td>${bill.phone}</td>
                <td><a href="index.php?controller=detail&id=${bill.bill_id}">Chi tiết</a></td>
                <td id = ${bill.bill_id} onclick="sendStatus(${bill.bill_id},${bill.bill_status});">  ${displayStatus(bill.bill_status)}   </td>
            </tr>    
        `
        document.getElementById('table-body').innerHTML +=html;     
    }
}
function sendStatus(id,stt){
        stt ++;
        request= new XMLHttpRequest();
        // request.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {              
        //             alert (this.responseText);
        //     }
        // };
        request.open("POST", "index.php?controller=bill&action=update");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(`id=${id}&stt=${stt}`);
        location.reload();
}
function displayStatus(s){
    if(s>3) s=3;
    if(s==0){
        return `<button class="btn-warning"> Xác nhận </button>`;
    }
    else if(s==1)
        return `<button style= "max-width : 190px" class="btn-info"> Đang chuẩn bị hàng </button>`;
    else if(s==2)
        return `<button style= "max-width : 190px" class="btn-secondary"> Đã giao cho DVVC </button>`;
    else 
        return  `<button style= "max-width : 190px" class="btn-success">    Giao thành công </button>`;
}
displayBill();