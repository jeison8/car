
let articles = [];
let subtotal = 0;
let items = 0;
let urlPetition = '';
let host = window.location.host;
let protocol =window.location.protocol;
let urlcart =window.location;

window.onload = function() {

	articles = JSON.parse(localStorage.getItem('cart')) || [];
	items = JSON.parse(localStorage.getItem('items')) || 0;

	htmlPrint();

  	if(items > 0){
  		document.getElementById("qty").classList.add('qty');
  	}

}

function addCart(id) {

	$.ajax({
		url: `add-cart/${id}`,
		success: function(response) {

			const exist = articles.some(article => article.id === response.id);
			if (!exist) {

				items++;
				articles = [...articles,response];

				articles.forEach (function(article){
					if(article.id == response.id){
						subtotal += article.price;
					}
			    });
			}

			htmlPrint();
		},
		error: function() {
	        console.log("No se ha podido obtener la información");
	    }
	});

}

function htmlPrint(){

	document.getElementById("articles").innerHTML = '';
	document.getElementById("items").innerHTML = '';
	document.getElementById("notification").innerHTML = '';
	document.getElementById("subTotal").innerHTML = '';
	document.getElementById("bottonEmpty").innerHTML = '';


	if(Object.keys(articles).length == 0 ){

		const row = document.createElement('div');
		row.innerHTML = `<small> -- No hay Articulos en el carrito -- </small>`;
		document.getElementById("articles").appendChild(row);

		document.getElementById("cart-btns").style.display = 'none';

	}else{

		document.getElementById("cart-btns").style.display = 'block';

		articles.forEach( article => {

			const row = document.createElement('div');
			row.innerHTML =
			`<div class="product-widget">
				<div class="product-img">
					<img src="${protocol+'//'+host+'/'+article.img}" alt="">
				</div>
				<div class="product-body">
					<h3 class="product-name">${article.nombre}<a href="#"></a></h3>
					<h4 class="product-price">$${new Intl.NumberFormat().format(article.precio)}</h4>
				</div>
				${urlcart.pathname == '/cart' ? '' : `<button class="delete" onclick="destroyCart(${article.id})"><i class="fa fa-close"></i></button>`}
			</div>`;

			document.getElementById("articles").appendChild(row);

		});

		const botton = document.createElement('section');
		botton.innerHTML = `${urlcart.pathname == '/cart' ? '' : `<button class="btn btn-block" onclick="emptyCart()">Vaciar carrito</button>`}`;
		document.getElementById("bottonEmpty").appendChild(botton);

	}

	document.getElementById("items").append(items);

	

	if(items > 0){
		document.getElementById("qty").classList.add('qty');
		document.getElementById("notification").append(items);
  	}else{
  		document.getElementById("qty").classList.remove('qty');
  	}

	localStorage.setItem('cart',JSON.stringify(articles));
	localStorage.setItem('items',JSON.stringify(items));

}

function destroyCart(id,cart){

	url = window.location;

	if(url.href.includes('product-detail')){
		urlPetition = window.location;
	}else{
		urlPetition =`add-cart/${id}`;
	}
	$.ajax({
		url: urlPetition,
		success: function(res) {
			articles = articles.filter(article => article.id !== id);
			items--;
			subtotal-=res.price;
			htmlPrint();
			if(cart == 'cart'){
				location.reload();
			}
		}
	});

}

function emptyCart(cart){

	articles = [];
	items = 0;
	subtotal = 0;

	htmlPrint();

	if(cart){
		location.reload();
	}
}



function viewCart() {

	 window.location.href="/cart";
}

function viewOrder() {

	 window.location.href="/order";
}


 function validateSearch(event){

	let selectCategory = document.getElementById("selectCategory").value;
	let find = document.getElementById("find").value;

	if(selectCategory == "" && find == ""){

	   	event.preventDefault();

	}

}

function viewOrder(){

	articles = JSON.parse(localStorage.getItem('cart')) || [];

	$.ajax({
	 	type: "GET",
      	url: `/store-register`,
     	data: {'articles': JSON.stringify(articles)},//capturo array 
		success: function(res) {
			if(res == 'ok'){
				alert('se ha registrado la compra');
				emptyCart();
			}else{
				alert('No hay articulos que registrar en la compra');
			}
		}
	});

}
