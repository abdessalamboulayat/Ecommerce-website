window.addEventListener('DOMContentLoaded', function(){
let navbar = document.getElementById("navbar");

navbar.addEventListener("scroll", function(){
    if(window.scrollY>900){
        navbar.classList.add("scroll");
    }
    else{
        navbar.classList.remove("scroll");
    }
});

let imgPrincipal = document.getElementById("imgPrincipal");
let img1 = document.getElementsByClassName("img1");
console.log(imgPrincipal);
console.log(img1);
console.log(img1[0]);
console.log(img1.length);
for(let i=0; i<img1.length; i++){
    img1[i].addEventListener('click', function(){
        imgPrincipal.setAttribute('src', img1[i].getAttribute('src'));
    })
}

//Cart
let buyNow = document.getElementById("buyNow");
let paymentForm  = document.getElementById("paymentForm");
buyNow.addEventListener('click', function(){
    paymentForm.style.display = "block";
})
let cancel = document.getElementById("cancel");
cancel.addEventListener('click', function(){
    paymentForm.style.display = "none";
})
//Quantity
// let plus = document.getElementById("plus");
// let moins = document.getElementById("moins");
// console.log(plus);
// plus.addEventListener('click', function(){
//     console.log(plus);
// })
//header
// let toggle = document.querySelector('.toggle');
//         let head = document.querySelector('header');
//         let navBar1 = document.getElementById("navBar1");
//         toggle.addEventListener('click', function(){
//             console.log("toggle");
//             head.classList.toggle("open");
//         });


});
