let carts = document.querySelectorAll(".addToCart");

let products = [
	{
		name: 'Crab Legs',
		tag: 'crablegs',
		price: 21.99,
		inCart: 0
	},
	{
		name: 'Shrimp',
		tag: 'shrimp',
		price: 16.99,
		inCart: 0
	},
	{
		name: 'Squid',
		tag: 'squid',
		price: 19.99,
		inCart: 0
	},
	{
		name: 'Octopus',
		tag: 'octopus',
		price: 26.99,
		inCart: 0
	},
	{
		name: 'Mussels',
		tag: 'mussels',
		price: 23.99,
		inCart: 0
	},
];
for (let i = 0; i < carts.length; i++) {
	carts[i].addEventListener('click', () => {
		cartNumbers(products[i]);
		totalCost(products[i]);
	})
}

function onLoadCartNumber() {
	let productNumbers = localStorage.getItem('cartNumbers');

	if (productNumbers) {
		document.querySelector('.cart span').textContent = productNumbers;
	}

}

function cartNumbers(product) {
	let productNumbers = localStorage.getItem('cartNumbers');

	productNumbers = parseInt(productNumbers);

	if (productNumbers) {
		localStorage.setItem('cartNumbers', productNumbers + 1);
		document.querySelector('.cart span').textContent = productNumbers + 1;
	} else {
		localStorage.setItem('cartNumbers', 1);
		document.querySelector('.cart span').textContent = 1;

	}
	setItems(product);
}

function setItems(product) {
	let cartItems = localStorage.getItem('productsInCart');
	cartItems = JSON.parse(cartItems);

	if (cartItems != null) {
		if (cartItems[product.tag] == undefined) {
			cartItems = {
				...cartItems,
				[product.tag]: product
			}
		}
		cartItems[product.tag].inCart += 1;
	} else {
		product.inCart = 1;
		cartItems = {
			[product.tag]: product
		}
	}

	localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
	let cartCost = localStorage.getItem('totalCost');
	localStorage.setItem("totalCost", product.price);


	if (cartCost != null) {
		cartCost = parseInt(cartCost);
		localStorage.setItem("totalCost", cartCost + product.price);
	} else {
		localStorage.setItem("totalCost", product.price);
	}
	cartCost = cartCost.toFixed(2);

}
function displayCart() {
	let cartItems = localStorage.getItem("productsInCart");
	cartItems = JSON.parse(cartItems);

	let cart = localStorage.getItem("totalCost");
    cart = parseFloat(cart).toFixed(2);

	let productContainer = document.querySelector(".products-adding");

	if (cartItems && productContainer) {
		productContainer.innerHTML = '';
		Object.values(cartItems).map(item => {
			productContainer.innerHTML += `
			<div style="    border-bottom:1px solid darkblue;
"			class="products-adding">
			<div class="products">
				<ion-icon name="close-outline"></ion-icon>
				<img src="images/${item.tag}.jpeg"/>
				<span>${item.name}</span>
			</div>
			<div class="price">$${item.price}</div>
			<div class="quantity">
				<span>${item.inCart} lb</span>
			</div>
			<div class="total">
				$${item.inCart * item.price}
			</div>
			</div>
			`
		});
		if(cart > 0){
		productContainer.innerHTML += `
		<div class="basketTotalContainer">
			<h4 class="basketTotalTitle">Cart Total</h4>
			<h4 class="basketTotal">$${cart}</h4>
		</div>
		<div class="checkoutButtonSection">
			<button class= "checkoutButton">Place Your Order</button>
		</div>
		
		`
		}
		if(cart <= 0){
			productContainer.innerHTML += `
			<div class="emptyCart">
				<h4 class="emptyCartText">There are no items in your cart</h4>
			</div>`
			}
	}
	deleteButtons()
}


function deleteButtons() {
    let deleteButtons = document.querySelectorAll('.products ion-icon');
    let productNumbers = localStorage.getItem('cartNumbers');
    let cartCost = localStorage.getItem("totalCost");
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    let productName;
    console.log(cartItems);

    for(let i=0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', () => {
            productName = deleteButtons[i].parentElement.textContent.toLocaleLowerCase().replace(/ /g,'').trim();
           
            localStorage.setItem('cartNumbers', productNumbers - cartItems[productName].inCart);
            localStorage.setItem('totalCost', cartCost - ( cartItems[productName].price * cartItems[productName].inCart));

            delete cartItems[productName];
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));

            displayCart();
            onLoadCartNumber();
        })
    }
}


onLoadCartNumber();
displayCart();