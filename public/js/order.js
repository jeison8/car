
window.onload = function() {

  articles = JSON.parse(localStorage.getItem('cart')) || [];
  items = JSON.parse(localStorage.getItem('items')) || 0;
  subtotal = JSON.parse(localStorage.getItem('subtotal')) || 0;

  detailPrint();

  $('#city').select2();
  $('#city').select2({theme: "bootstrap4"});

}

function detailPrint(){

	if(Object.keys(articles).length == 0 ){

		const row = document.createElement('div');
		row.innerHTML = `<small> -- No hay Articulos en el carrito -- </small>`;
		document.getElementById("articles").appendChild(row);

	}else{

		
		articles.forEach( (article,index) => {

			const item = document.createElement('div');	
			item.innerHTML = `
			<table table table-responsive>
			<tr>
				<td>
	          		<img src="${protocol+'//'+host+'/'+article.img}" width="180px">
	          	</td>
	          	<td>
	              <h4 class="product-name">${article.name}</h4>
	              <h4>$${new Intl.NumberFormat().format(article.price)}</h4>
	              <small>Cantidad: 1</small>
	          	</td>
	        </tr>
	        </table>`;

		   	index == 0 ? item.className = 'item active' : item.className = 'item';

			document.getElementById("inner").appendChild(item);


		});


		document.getElementById("articlesNumber").append(items);

		let subTotal = new Intl.NumberFormat().format(subtotal);
		document.getElementById("articlesPrice").append(subTotal);
		document.getElementById("orderTotal").append(subTotal);
		document.getElementById("total").value = subTotal;
		document.getElementById("number_articles").value = items;


		articles.forEach( (article,index) => {

			const inputs = document.createElement('section');	
			inputs.innerHTML = `<input type="hidden" name="nameproducts[]" value="${article.name}">
			<input type="hidden" name="priceproducts[]" value="${article.price}">`;

			document.getElementById("inputs").appendChild(inputs);

		});

	}

}


