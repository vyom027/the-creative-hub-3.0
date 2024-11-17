function closeProduct() {
  document.getElementById("pro-con").style.display = "none";
}

function Imgchange(Id) {
  let Imgsrc = document.getElementById(Id).src;
  document.getElementById("main-img").src = Imgsrc;
  return false;
}
function cart() {
  document.getElementById("pro-con").style.display = "none";
  document.getElementById("cart-con").style.display = "block";
  document.body.classList.add("no-scroll");
}

function closeCart() {
  document.getElementById("cart-con").style.display = "none";
  document.getElementById("pro-con").style.display = "block";
  document.body.classList.remove("no-scroll");
}
