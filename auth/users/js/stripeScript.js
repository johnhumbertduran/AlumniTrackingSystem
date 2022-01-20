
const stripe = Stripe("pk_test_51KIeCiDMpco1oCBFwEBhCdicLQFvRz2nALSIJ8H3yd1GcRZppPuzccfrnMyjgjPmSUeZS9XCpQ3cWEuyz8epwcHt00rN5Exdsm");
const btn = document.querySelector("#submitPayment");
btn.addEventListener('click',()=>{
    fetch('./checkout.php',{
        method:"POST",
        headers:{
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify({})
    }).then(res => res.json())
    .then(payload =>{
        stripe.redirectToCheckout({sessionId:payload.id})
    })
})