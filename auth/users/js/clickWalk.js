let cash_payment = document.getElementById("cash_payment");
let bank_payment = document.getElementById("bank_payment");



function cashPayment(){
    
    if(cash_payment.checked == true){
        document.getElementById("forWalkIn").classList.remove('d-none');
        document.getElementById("forWalkIn").classList.add('d-block');
        document.getElementById("forHr").classList.remove('d-none');
        document.getElementById("forHr").classList.add('d-block');
        document.getElementById("downloadFile").classList.remove('d-none');
        document.getElementById("downloadFile").classList.add('d-block');
        document.getElementById("forBank").classList.remove('d-block');
        document.getElementById("forBank").classList.add('d-none');
        document.getElementById("submitPayment").classList.remove('d-block');
        document.getElementById("submitPayment").classList.add('d-none');
    }
    
}

function bankPayment(){
    
    if(bank_payment.checked == true){
        document.getElementById("forBank").classList.remove('d-none');
        document.getElementById("forBank").classList.add('d-block');
        document.getElementById("forHr").classList.remove('d-none');
        document.getElementById("forHr").classList.add('d-block');
        document.getElementById("submitPayment").classList.remove('d-none');
        document.getElementById("submitPayment").classList.add('d-block');
        document.getElementById("forWalkIn").classList.remove('d-block');
        document.getElementById("forWalkIn").classList.add('d-none');
        document.getElementById("downloadFile").classList.remove('d-block');
        document.getElementById("downloadFile").classList.add('d-none');
    }


}

bankPayment();

let qty = document.getElementById("reservationQuantityWalk").value;
let tSum = 0;
let small = document.getElementById("smallWalk");
let medium = document.getElementById("mediumWalk");
let large = document.getElementById("largeWalk");
let xl = document.getElementById("xlWalk");
let xxl = document.getElementById("xxlWalk");
let totalReservationFormula;
let totalReservation = document.getElementById("totalReservationWalk");

let wholepage = document.getElementById("wholepageWalk");
let halfpage = document.getElementById("halfpageWalk");
let frontcoverpage = document.getElementById("frontcoverpageWalk");
let backcoverpage = document.getElementById("backcoverpageWalk");
let flipcoverpage = document.getElementById("flipcoverpageWalk");
let oneliner = document.getElementById("onelinerWalk");

let totalAmount = document.getElementById("total_amountWalk");
let totalSouvenir = 0;
let wholepageAmount = 0;
let halfpageAmount = 0;
let frontcoverpageAmount = 0;
let backcoverpageAmount = 0;
let flipcoverpageAmount = 0;
let onelinerAmount = 0;
let smallT = document.getElementById("smallTWalk");
let mediumT = document.getElementById("mediumTWalk");
let largeT = document.getElementById("largeTWalk");
let extralargeT = document.getElementById("extralargeTWalk");
let doublexlT = document.getElementById("doublexlTWalk");
let souvenir = document.getElementById("souvenirTWalk");
let totalamountT = document.getElementById("totalamountTWalk");

    small.value = smallT.value;
    medium.value = mediumT.value;
    large.value = largeT.value;
    xl.value = extralargeT.value;
    xxl.value = doublexlT.value;
    // totalamount.value = totalamountT.value;
    

function sumShirts(){
    tSum = parseInt(small.value) + parseInt(medium.value) + parseInt(large.value) + parseInt(xl.value) + parseInt(xxl.value);
    // alert(parseInt(tSum));
}

// if(wholepage.checked == true){
//     wholepageAmount = 5000;
//     totalAmount.value = parseInt(totalReservation.value) + wholepageAmount;
// }

// if(halfpage.checked == true){
//     parseInt(totalAmount.value) += 3000;
// }

// if(frontcoverpage.checked == true){
//     parseInt(totalAmount.value) += 10000;
// }

// if(backcoverpage.checked == true){
//     parseInt(totalAmount.value) += 10000;
// }

// if(flipcoverpage.checked == true){
//     parseInt(totalAmount.value) += 10000;
// }

// if(oneliner.checked == true){
//     parseInt(totalAmount.value) += 1000;
// }

sumShirts();
if(tSum >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

function wholePageClickWalk(){
    if(wholepage.checked == true){
        wholepageAmount = 5000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + wholepageAmount;
        // wholepageAmount = 5000;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // wholepageAmount = 0;
        totalAmount.value = parseInt(totalAmount.value) - wholepageAmount;
    }
}

function halfPageClickWalk(){

    if(halfpage.checked == true){
        halfpageAmount = 3000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + halfpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // halfpageAmount = 0;
        totalAmount.value = parseInt(totalAmount.value) - halfpageAmount;
    }
}

function frontCoverPageClickWalk(){

    if(frontcoverpage.checked == true){
        frontcoverpageAmount = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + frontcoverpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // frontcoverpageAmount = 0;
        totalAmount.value = parseInt(totalAmount.value) - frontcoverpageAmount;
    }
}

function backCoverPageClickWalk(){

    if(backcoverpage.checked == true){
        backcoverpageAmount = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + backcoverpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // backcoverpageAmount = 0;
        totalAmount.value = parseInt(totalAmount.value) - backcoverpageAmount;
    }
}

function flipCoverPageClickWalk(){

    if(flipcoverpage.checked == true){
        flipcoverpageAmount = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + flipcoverpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // flipcoverpageAmount = 0;
        totalAmount.value = parseInt(totalAmount.value) - flipcoverpageAmount;
    }
}

function oneLinerClickWalk(){

    if(oneliner.checked == true){
        onelinerAmount = 1000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + onelinerAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // onelinerAmount = 0;
        totalAmount.value = parseInt(totalAmount.value) - onelinerAmount;
    }
}

totalAmount.addEventListener("change", totalAmountChange);

function totalAmountChangeWalk(){
    totalamountT.value = totalReservationFormula;
    // alert("change");
}

function reservationChangeWalk(){
    // totalReservation();
    // alert(parseInt(tSum));
    totalReservationFormula = document.getElementById("reservationQuantityWalk").value *1000;
    totalReservation.value = totalReservationFormula;
    totalAmountChange();
    // totalamountT.value = totalAmount.value;
    if(wholepage.checked == true){
        wholepageAmount = 5000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + wholepageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // wholepageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) - wholepageAmount;
    }

    if(halfpage.checked == true){
        halfpageAmount = 3000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + halfpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // halfpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) - halfpageAmount;
    }

    if(frontcoverpage.checked == true){
        frontcoverpageAmount = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + frontcoverpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // frontcoverpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) - frontcoverpageAmount;
    }

    if(backcoverpage.checked == true){
        backcoverpageAmount = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + backcoverpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // backcoverpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) - backcoverpageAmount;
    }

    if(flipcoverpage.checked == true){
        flipcoverpageAmount = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + flipcoverpageAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // flipcoverpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) - flipcoverpageAmount;
    }

    if(oneliner.checked == true){
        onelinerAmount = 1000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) + onelinerAmount;
        totalamountT.value = totalAmount.value;
        return totalAmount.value
    }else{
        // onelinerAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmount.value = parseInt(totalReservation.value) - onelinerAmount;
    }

    if(document.getElementById("reservationQuantityWalk").value >= tSum){
        small.disabled = false;
        medium.disabled = false;
        large.disabled = false;
        xl.disabled = false;
        xxl.disabled = false;
    }
    // alert(tSum);
    if(tSum >= document.getElementById("reservationQuantityWalk").value){
        document.getElementById("reservationQuantityWalk").value = tSum;
        document.getElementById("totalReservationWalk").value = document.getElementById("reservationQuantityWalk").value * 1000;
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    // alert("hay");
}

    

function smallChangeWalk(){
    sumShirts();
    // alert(tSum.value);
    if(parseInt(small.value) >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    
    if(tSum >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("smallTWalk").value = document.getElementById("smallWalk").value;
}

function mediumChangeWalk(){
    sumShirts();
    // alert(tSum.value);
    if(parseInt(medium.value) >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("mediumTWalk").value = document.getElementById("mediumWalk").value;
}

function largeChangeWalk(){
    if(parseInt(large.value) >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("largeTWalk").value = document.getElementById("largeWalk").value;
}

function xlChangeWalk(){
    if(parseInt(xl.value) >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("extralargeTWalk").value = document.getElementById("xlWalk").value;
}

function xxlChangeWalk(){
    if(parseInt(xxl.value) >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantityWalk").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("doublexlTWalk").value = document.getElementById("xxlWalk").value;
}

function totalAmountClickWalk(){

    if(wholepage.checked == true){
        totalAmount.value = parseInt(totalReservation.value) + 5000;
    }
    
    if(halfpage.checked == true){
        totalAmount.value = parseInt(totalReservation.value) + 3000;
    }
    
    if(frontcoverpage.checked == true){
        totalAmount.value = parseInt(totalReservation.value) + 10000;
    }
    
    if(backcoverpage.checked == true){
        totalAmount.value = parseInt(totalReservation.value) + 10000;
    }
    
    if(flipcoverpage.checked == true){
        totalAmount.value = parseInt(totalReservation.value) + 10000;
    }
    
    if(oneliner.checked == true){
        totalAmount.value = parseInt(totalReservation.value) + 1000;
    }

    if((wholepage.checked == false) || (halfpage.checked == false) || (frontcoverpage.checked == false) || (backcoverpage.checked == false) || (flipcoverpage.checked == false) || (oneliner.checked == false)){
        totalAmount.value = totalAmount.value;
    }
    // totalReservation = document.getElementById("reservationQuantity").value *1000;
    // document.getElementById("reservation").value = totalReservation;
}
totalAmountClickWalk();