try {
  const logoutElement = document.getElementById("logout-form");

  if (logoutElement === null) {
    let localData = JSON.parse(localStorage.getItem("cart-item"));
    const cartElement = document.getElementById("total-item-in-cart");
    if (localData) {
      cartElement.innerHTML = localData.length;
    } else {
      cartElement.innerHTML = 0;
    }
  }
} catch (error) {
  console.log("user active");
}
