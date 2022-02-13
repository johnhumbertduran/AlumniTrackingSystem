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

// bankPayment();

let qty = document.getElementById("reservationQuantity").value;
let tSum = 0;
let small = document.getElementById("small");
let medium = document.getElementById("medium");
let large = document.getElementById("large");
let xl = document.getElementById("xl");
let xxl = document.getElementById("xxl");
let totalReservationFormula;
let totalReservation = document.getElementById("totalReservation");

let wholepage = document.getElementById("wholepage");
let halfpage = document.getElementById("halfpage");
let frontcoverpage = document.getElementById("frontcoverpage");
let backcoverpage = document.getElementById("backcoverpage");
let flipcoverpage = document.getElementById("flipcoverpage");
let oneliner = document.getElementById("oneliner");

let totalAmount = document.getElementById("total_amount");
let totalSouvenir = 0;
let wholepageAmount = 0;
let halfpageAmount = 0;
let frontcoverpageAmount = 0;
let backcoverpageAmount = 0;
let flipcoverpageAmount = 0;
let onelinerAmount = 0;
let smallT = document.getElementById("smallT");
let mediumT = document.getElementById("mediumT");
let largeT = document.getElementById("largeT");
let extralargeT = document.getElementById("extralargeT");
let doublexlT = document.getElementById("doublexlT");
let souvenir = document.getElementById("souvenirT");
let totalamountT = document.getElementById("totalamountT");

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
if(tSum >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

function wholePageClick(){
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

function halfPageClick(){

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

function frontCoverPageClick(){

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

function backCoverPageClick(){

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

function flipCoverPageClick(){

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

function oneLinerClick(){

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

function totalAmountChange(){
    totalamountT.value = totalReservationFormula;
    // alert("change");
}

function reservationChange(){
    // totalReservation();
    // alert(parseInt(tSum));
    totalReservationFormula = document.getElementById("reservationQuantity").value *1000;
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

    if(document.getElementById("reservationQuantity").value >= tSum){
        small.disabled = false;
        medium.disabled = false;
        large.disabled = false;
        xl.disabled = false;
        xxl.disabled = false;
    }
    // alert(tSum);
    if(tSum >= document.getElementById("reservationQuantity").value){
        document.getElementById("reservationQuantity").value = tSum;
        document.getElementById("totalReservation").value = document.getElementById("reservationQuantity").value * 1000;
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    // alert("hay");
}

    

function smallChange(){
    sumShirts();
    // alert(tSum.value);
    if(parseInt(small.value) >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    
    if(tSum >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("smallT").value = document.getElementById("small").value;
}

function mediumChange(){
    sumShirts();
    // alert(tSum.value);
    if(parseInt(medium.value) >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("mediumT").value = document.getElementById("medium").value;
}

function largeChange(){
    if(parseInt(large.value) >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("largeT").value = document.getElementById("large").value;
}

function xlChange(){
    if(parseInt(xl.value) >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("extralargeT").value = document.getElementById("xl").value;
}

function xxlChange(){
    if(parseInt(xxl.value) >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }
    sumShirts();
    if(tSum >= document.getElementById("reservationQuantity").value){
        small.disabled = true;
        medium.disabled = true;
        large.disabled = true;
        xl.disabled = true;
        xxl.disabled = true;
    }

    document.getElementById("doublexlT").value = document.getElementById("xxl").value;
}

function totalAmountClick(){

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
totalAmountClick();







// #############################################################################################
// #############################################################################################
// #############################################################################################
// #############################################################################################
// #############################################################################################
// #############################################################################################
// #############################################################################################
// #############################################################################################

                                        // FOR WALK IN SCRIPTS

let qtyWalk = document.getElementById("reservationQuantityWalk").value;
let tSumWalk = 0;
let smallWalk = document.getElementById("smallWalk");
let mediumWalk = document.getElementById("mediumWalk");
let largeWalk = document.getElementById("largeWalk");
let xlWalk = document.getElementById("xlWalk");
let xxlWalk = document.getElementById("xxlWalk");
let totalReservationFormulaWalk;
let totalReservationWalk = document.getElementById("totalReservationWalk");

let wholepageWalk = document.getElementById("wholepageWalk");
let halfpageWalk = document.getElementById("halfpageWalk");
let frontcoverpageWalk = document.getElementById("frontcoverpageWalk");
let backcoverpageWalk = document.getElementById("backcoverpageWalk");
let flipcoverpageWalk = document.getElementById("flipcoverpageWalk");
let onelinerWalk = document.getElementById("onelinerWalk");

let totalAmountWalk = document.getElementById("total_amountWalk");
let totalSouvenirWalk = 0;
let wholepageAmountWalk = 0;
let halfpageAmountWalk = 0;
let frontcoverpageAmountWalk = 0;
let backcoverpageAmountWalk = 0;
let flipcoverpageAmountWalk = 0;
let onelinerAmountWalk = 0;
let smallTWalk = document.getElementById("smallTWalk");
let mediumTWalk = document.getElementById("mediumTWalk");
let largeTWalk = document.getElementById("largeTWalk");
let extralargeTWalk = document.getElementById("extralargeTWalk");
let doublexlTWalk = document.getElementById("doublexlTWalk");
let souvenirWalk = document.getElementById("souvenirTWalk");
let totalamountTWalk = document.getElementById("totalamountTWalk");

    smallWalk.value = smallTWalk.value;
    mediumWalk.value = mediumTWalk.value;
    largeWalk.value = largeTWalk.value;
    xlWalk.value = extralargeTWalk.value;
    xxlWalk.value = doublexlTWalk.value;
    

function sumShirtsWalk(){
    tSumWalk = parseInt(smallWalk.value) + parseInt(mediumWalk.value) + parseInt(largeWalk.value) + parseInt(xlWalk.value) + parseInt(xxlWalk.value);
    
}


sumShirtsWalk();
if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }

function wholePageClickWalk(){
    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        // wholepageAmount = 5000;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalAmountWalk.value) - wholepageAmountWalk;
    }
}

function halfPageClickWalk(){

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        // halfpageAmount = 0;
        totalAmountWalk.value = parseInt(totalAmountWalk.value) - halfpageAmountWalk;
    }
}

function frontCoverPageClickWalk(){

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        // frontcoverpageAmount = 0;
        totalAmountWalk.value = parseInt(totalAmountWalk.value) - frontcoverpageAmountWalk;
    }
}

function backCoverPageClickWalk(){

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        // backcoverpageAmount = 0;
        totalAmountWalk.value = parseInt(totalAmountWalk.value) - backcoverpageAmountWalk;
    }
}

function flipCoverPageClickWalk(){

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        // flipcoverpageAmount = 0;
        totalAmountWalk.value = parseInt(totalAmountWalk.value) - flipcoverpageAmountWalk;
    }
}

function oneLinerClickWalk(){

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalAmountWalk.value) - onelinerAmountWalk;
    }
}

totalAmountWalk.addEventListener("change", totalAmountChangeWalk);

function totalAmountChangeWalk(){
    totalamountTWalk.value = totalReservationFormulaWalk;
}

function reservationChangeWalk(){
    
    totalReservationFormulaWalk = document.getElementById("reservationQuantityWalk").value *1000;
    totalReservationWalk.value = totalReservationFormulaWalk;
    totalAmountChangeWalk();
    
    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - wholepageAmountWalk;
    }

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - halfpageAmountWalk;
    }

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - frontcoverpageAmountWalk;
    }

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - backcoverpageAmountWalk;
    }

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - flipcoverpageAmountWalk;
    }

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - onelinerAmountWalk;
    }

    if(document.getElementById("reservationQuantityWalk").value >= tSumWalk){
        smallWalk.disabled = false;
        mediumWalk.disabled = false;
        largeWalk.disabled = false;
        xlWalk.disabled = false;
        xxlWalk.disabled = false;
    }
    // alert(tSum);
    if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        document.getElementById("reservationQuantityWalk").value = tSumWalk;
        document.getElementById("totalReservationWalk").value = document.getElementById("reservationQuantityWalk").value * 1000;
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }
    
}

    

function smallChangeWalk(){

    totalamountTWalk.value = parseInt(totalReservationWalk.value);

    sumShirtsWalk();
    // alert(tSum.value);
    if(parseInt(smallWalk.value) >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }
    
    if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }


    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - wholepageAmountWalk;
    }

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - halfpageAmountWalk;
    }

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - frontcoverpageAmountWalk;
    }

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - backcoverpageAmountWalk;
    }

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - flipcoverpageAmountWalk;
    }

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - onelinerAmountWalk;
    }

    document.getElementById("smallTWalk").value = document.getElementById("smallWalk").value;
    
}

function mediumChangeWalk(){

    totalamountTWalk.value = parseInt(totalReservationWalk.value);

    sumShirtsWalk();
    // alert(tSum.value);
    if(parseInt(mediumWalk.value) >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }
    sumShirtsWalk();
    if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }

    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - wholepageAmountWalk;
    }

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - halfpageAmountWalk;
    }

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - frontcoverpageAmountWalk;
    }

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - backcoverpageAmountWalk;
    }

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - flipcoverpageAmountWalk;
    }

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - onelinerAmountWalk;
    }

    document.getElementById("mediumTWalk").value = document.getElementById("mediumWalk").value;
    
}

function largeChangeWalk(){

    totalamountTWalk.value = parseInt(totalReservationWalk.value);

    if(parseInt(largeWalk.value) >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }
    sumShirtsWalk();
    if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }

    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - wholepageAmountWalk;
    }

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - halfpageAmountWalk;
    }

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - frontcoverpageAmountWalk;
    }

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - backcoverpageAmountWalk;
    }

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - flipcoverpageAmountWalk;
    }

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - onelinerAmountWalk;
    }
    
    document.getElementById("largeTWalk").value = document.getElementById("largeWalk").value;
    
}

function xlChangeWalk(){

    totalamountTWalk.value = parseInt(totalReservationWalk.value);

    if(parseInt(xlWalk.value) >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }
    sumShirtsWalk();
    if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }

    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - wholepageAmountWalk;
    }

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - halfpageAmountWalk;
    }

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - frontcoverpageAmountWalk;
    }

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - backcoverpageAmountWalk;
    }

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - flipcoverpageAmountWalk;
    }

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - onelinerAmountWalk;
    }

    document.getElementById("extralargeTWalk").value = document.getElementById("xlWalk").value;
    
}

function xxlChangeWalk(){

    totalamountTWalk.value = parseInt(totalReservationWalk.value);

    if(parseInt(xxlWalk.value) >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }
    sumShirtsWalk();
    if(tSumWalk >= document.getElementById("reservationQuantityWalk").value){
        smallWalk.disabled = true;
        mediumWalk.disabled = true;
        largeWalk.disabled = true;
        xlWalk.disabled = true;
        xxlWalk.disabled = true;
    }

    if(wholepageWalk.checked == true){
        wholepageAmountWalk = 5000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + wholepageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - wholepageAmountWalk;
    }

    if(halfpageWalk.checked == true){
        halfpageAmountWalk = 3000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + halfpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - halfpageAmountWalk;
    }

    if(frontcoverpageWalk.checked == true){
        frontcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + frontcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - frontcoverpageAmountWalk;
    }

    if(backcoverpageWalk.checked == true){
        backcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + backcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - backcoverpageAmountWalk;
    }

    if(flipcoverpageWalk.checked == true){
        flipcoverpageAmountWalk = 10000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + flipcoverpageAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - flipcoverpageAmountWalk;
    }

    if(onelinerWalk.checked == true){
        onelinerAmountWalk = 1000;
        
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + onelinerAmountWalk;
        totalamountTWalk.value = totalAmountWalk.value;
        return totalAmountWalk.value
    }else{
        totalAmountWalk.value = parseInt(totalReservationWalk.value) - onelinerAmountWalk;
    }

    document.getElementById("doublexlTWalk").value = document.getElementById("xxlWalk").value;
    
}

function totalAmountClickWalk(){

    if(wholepageWalk.checked == true){
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + 5000;
    }
    
    if(halfpageWalk.checked == true){
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + 3000;
    }
    
    if(frontcoverpageWalk.checked == true){
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + 10000;
    }
    
    if(backcoverpageWalk.checked == true){
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + 10000;
    }
    
    if(flipcoverpageWalk.checked == true){
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + 10000;
    }
    
    if(onelinerWalk.checked == true){
        totalAmountWalk.value = parseInt(totalReservationWalk.value) + 1000;
    }

    if((wholepageWalk.checked == false) || (halfpageWalk.checked == false) || (frontcoverpageWalk.checked == false) || (backcoverpageWalk.checked == false) || (flipcoverpageWalk.checked == false) || (onelinerWalk.checked == false)){
        totalAmountWalk.value = totalAmountWalk.value;
    }
    // totalReservation = document.getElementById("reservationQuantity").value *1000;
    // document.getElementById("reservation").value = totalReservation;
}
totalAmountClickWalk();