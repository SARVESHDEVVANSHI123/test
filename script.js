var cart = [];
$(document).ready(function () {
  createProducts();
  careteCartElement();
  $(".add-to-cart").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var obj = getCartProducts(id);
    if (obj.length > 0) {
      obj[0].quantity++;
    } else {
      cart.push({ id: id, quantity: 1 });
    }
    displayCart();
  });
  $("body").on("click", ".remove", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    deleteCart(id);
    displayCart();
  });
  $("body").on("click", ".update", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var qty = parseInt($("#update-" + id).val());
    var obj = getCartProducts(parseInt(id));
    obj[0].quantity += qty;
    displayCart();
  });
  $("body").on("click", ".empty", function (e) {
    e.preventDefault();
    cart.length = 0;
    $("#cart").html("Cart is Empty");
  });
});

function getCartProducts(id) {
  var obj = cart.filter((v, i) => {
    return v.id == id;
  });
  return obj;
}
function getProducts(id) {
  var obj = products.filter((v, i) => {
    return v.id == id;
  });
  return obj;
}
function careteCartElement() {
  $("<div id='cart'></div>").insertAfter("#products");
}
function displayCart() {
  var html = `<a class="empty" href="#">Empty</a><table>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Image</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Update</th>
    <th>Action</th>
    </tr>`;
  for (var i = 0; i < cart.length; i++) {
    var id = cart[i].id;
    var prod = getProducts(id);
    html += `
        <tr>
        <td>${cart[i].id}</td>
        <td>${prod[0].name}</td>
        <td><img src="images/${prod[0].image}" width="50" height="50"></td>
        <td>${prod[0].price}</td>
        <td>${cart[i].quantity}</td>
        <td><input type="number" id="update-${cart[i].id}">
        <a class="update" href="#" data-id="${cart[i].id}">Update</a></td>
        <td><a class="remove" href="#" data-id="${cart[i].id}">Delete</a></td>
        </tr>`;
  }
  $("#cart").html(html);
}

function createProducts() {
  var html = "";
  for (var i = 0; i < products.length; i++) {
    html +=
      '<div id="' +
      products[i].id +
      '" class="product">\
        <img src="images/' +
      products[i].image +
      '">\
        <h3 class="title"><a href="#">' +
      products[i].name +
      "</a></h3>\
        <span>Price: $" +
      products[i].price +
      '</span>\
        <a class="add-to-cart" href="#" data-id="' +
      products[i].id +
      '">Add To Cart</a>\
    </div>';
  }
  $("#products").html(html);
}

function deleteCart(id) {
  for (var i = 0; i < cart.length; i++) {
    if (id == cart[i].id) {
      cart.splice(i, 1);
      break;
    }
  }
}
