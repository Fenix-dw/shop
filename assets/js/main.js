
// переменна URL сайта
var siteURL = "http://master-shop.loc/";

// переменна кнопки показать еще
var btnShowMore = document.querySelector("#show-more");
if(btnShowMore) {
	// при нажатии кнопки виполнить
	btnShowMore.onclick = function() {
		// переманна инпута- на какой странице сейчас находимся
		var currentPageInput = document.querySelector('#current-page');
		// Создаем новый объект XMLHttpRequest и адрес на него помещаем в переменную ajax
		var ajax = new XMLHttpRequest();
			// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
			ajax.open("GET", siteURL + "modules/products/get_more.php?page=" + currentPageInput.value, false)
			// Выполняем отправку запроса
			ajax.send();
		
		// додаем 1 к переменной currentPageInput
		currentPageInput.value =  +currentPageInput.value + 1;

		// есле ajax.response пустой то
		if(ajax.response == "") {
			// btnShowMore скрываем
			btnShowMore.style.display = "none";
		}
		// переменна продуктыв
		var productsBlock = document.querySelector('#products');
			// добавление ajax.response в productsBlock.innerHTML 
			productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
	}
}


// функция добавление товар в корзину
function addToBasket(btn) {

	// Создаем новый объект XMLHttpRequest и адрес на него помещаем в переменную ajax
	var ajax = new XMLHttpRequest();
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("POST", siteURL + "/modules/basket/add-basket.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		// Выполняем отправку запроса
		ajax.send("id=" + btn.dataset.id);

	// JSON.parse - декодировка JSON-строку
	var response = JSON.parse(ajax.response);
    
    // переменна килькости елементов вкорзини 
	var btnGoBasket = document.querySelector("#go-basket span");
		// в перменну btnGoBasket.innerText добавление килькость добавленых товаров 
		btnGoBasket.innerText = response.count;
}

	
// Удаление товара з корзини
function deleteProductToBasket(btn, id) {
	btn.parentNode.parentNode.remove();
	// Создаем новый объект XMLHttpRequest и адрес на него помещаем в переменную ajax
	var ajax = new XMLHttpRequest;
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("POST", siteURL + "/modules/basket/delete.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		// Выполняем отправку запроса
		ajax.send("id=" + id);

	// JSON.parse - декодировка JSON-строку
	var response = JSON.parse(ajax.response);

	// переменна килькости елементов вкорзини 
	var btnGoBasket = document.querySelector("#go-basket span");
		// в перменну btnGoBasket.innerText добавление килькость добавленых товаров 
		btnGoBasket.innerText = response.count;

 		// переменна продуктыв
	var sum = document.querySelector('#sum');
		// замена ajax.response в productsBlock.innerHTML 
		sum.innerHTML = response.sum;	

	if(response.count == 0){
				
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("GET", siteURL + "modules/basket/basket-table.php", false);
		// Выполняем отправку запроса
		ajax.send();	
		// еменна продуктыв
	var productsBlock = document.querySelector('#products');
		// замена ajax.response в productsBlock.innerHTML 
		productsBlock.innerHTML = ajax.response;		
	}
	

}


function plusCount(btn) {

	// Создаем новый объект XMLHttpRequest и адрес на него помещаем в переменную ajax
	var ajax = new XMLHttpRequest;
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("GET", siteURL + "/modules/basket/plusCount.php?key=" + btn.dataset.key, false );
	// Выполняем отправку запроса
		ajax.send();
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("GET", siteURL + "modules/basket/basket-table.php", false);
	// Выполняем отправку запроса
		ajax.send();

	// переменна продуктыв
	var productsBlock = document.querySelector('#products');
		// замена ajax.response в productsBlock.innerHTML 
		productsBlock.innerHTML = ajax.response;
}

function minusCount(btn) {

	// Создаем новый объект XMLHttpRequest и адрес на него помещаем в переменную ajax
	var ajax = new XMLHttpRequest;
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("GET", siteURL + "/modules/basket/minusCount.php?key=" + btn.dataset.key, false );
	// Выполняем отправку запроса
		ajax.send();
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("GET", siteURL + "modules/basket/basket-table.php", false);
	// Выполняем отправку запроса
		ajax.send()

	// переменна продуктыв
	var productsBlock = document.querySelector('#products');
		// замена ajax.response в productsBlock.innerHTML 
		productsBlock.innerHTML = ajax.response;
}

// функция обновление количества
function change (obj, id , cost) {

		// Создаем новый объект XMLHttpRequest и адрес на него помещаем в переменную ajax
	var ajax = new XMLHttpRequest();
		// Открываем запрос на сервер. Для этого нам нужно передать 3 параметра в функцию "open"
		ajax.open("POST", siteURL + "/modules/basket/change.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		// Выполняем отправку запроса
		ajax.send("id=" + id + "&count=" + obj.value + "&cost=" + cost);	

		// JSON.parse - декодировка JSON-строку
	var response = JSON.parse(ajax.response);
		// подщот стоимости
		obj.parentNode.nextElementSibling.innerText = response.cost;

		// переменна продуктыв
	var sum = document.querySelector('#sum');
		// замена ajax.response в productsBlock.innerHTML 
		sum.innerHTML = response.sum;		

}
