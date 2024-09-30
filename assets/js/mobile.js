function closeProduct() {
  document.getElementById("pro-con").style.display = "none";
}

function Imgchange(Id) {
  let Imgsrc = document.getElementById(Id).src;
  document.getElementById("main-img").src = Imgsrc;
  return false;
}
function cart() {
  // Hide the product section
  document.getElementById("pro-con").style.display = "none";
  // Show the cart section
  document.getElementById("cart-con").style.display = "block";
}

function closeCart() {
  // Hide the cart section
  document.getElementById("cart-con").style.display = "none";
}
