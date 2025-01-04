function getUsersCartsAPI() {
    return fetch('API/cartAPI.php/getUsersCarts')
      .then(response => {
        if (!response.ok) {
          throw new Error('La API no respondió correctamente');
        }
        return response.json();
      })
      .catch(error => console.error('Error:', error));
      
}

function displayUsersCarts(carts) {
    const cartTable = document.getElementById('cartTable');
    console.log(carts);
    carts.forEach(cart => {
        const tr = document.createElement('tr');
        for (const content in cart) {
            if (content === 'password') {
                continue;
            }
            const td = document.createElement('td');
            td.textContent = cart[content];
            tr.appendChild(td);

            
        }
        const button = document.createElement('button');
        button.textContent = 'Editar';
        button.className = 'admin-edit-button';
        button.onclick = () => {
            window.location.href = `adminPanelEditCart.php?id=${cart.id}`;
        }
        tr.appendChild(button);

        const button2 = document.createElement('button');
        button2.textContent = 'Borrar';
        button2.className = 'admin-delete-button';
        button2.onclick = () => {
            return fetch('API/cartAPI.php/deleteCart')
            //window.location.href = `CRUD_Admin_Panel.js?id=${cart.user_ID}&cart_ID=${cart.productos}`;
        }
        tr.appendChild(button2);

        cartTable.appendChild(tr);
    });
}

/*function deleteCart(user_ID, cart_ID) {

}*/

getUsersCartsAPI()
    .then(carts => displayUsersCarts(carts))