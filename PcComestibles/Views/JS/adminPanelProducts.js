function getProductsAPI() {
    return fetch('API/productsAPI.php/getProducts')
      .then(response => {
        if (!response.ok) {
          throw new Error('La API no respondió correctamente');
        }
        return response.json();
      })
      .catch(error => console.error('Error:', error));
      
  }
  
function displayProducts(products) {
    const productTable = document.getElementById('productsTable');
    console.log(products);
    products.forEach(products => {
        const tr = document.createElement('tr');
        tr.id = products['producto_ID'];
        for (const content in products) {
            if (content === 'password') {
                continue;
            }
            if (content === 'producto_ID') {
              const td = document.createElement('td');
              td.textContent = products[content];
              tr.appendChild(td);
            } else {
              const input = document.createElement('input');
              input.value = products[content];
              tr.appendChild(input);
            }
          }
        const button1 = document.createElement('button');
        const button2 = document.createElement('button');
        button1.textContent = 'Guardar';
        button1.value = products['id'];
        button2.textContent = 'Eliminar';
        button2.value = products['id'];

        button1.addEventListener('click', function() {
          const ID = products['producto_ID'];

          const row = document.getElementById(ID);

          const inputs = row.querySelectorAll('input');

          const product = {
            name: inputs[1].value,
            price: inputs[2].value,
            last_price: inputs[3].value,
            image: inputs[4].value,
            type: inputs[5].value,
            promo: inputs[6].value,
            id: ID
          };

          console.log(product)

          fetch('API/modifyProduct.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(product)

          }).then(response => {
            console.log('debug 1');
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
            }
            //console.log('Respuesta: ',response.));
            return response.json();
          })
            
        })

        button2.addEventListener('click', function() {
            console.log('Eliminar', products['producto_ID']);
            fetch('API/deleteProduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: products['producto_ID'] })
            }).then(response => {
              console.log('debug 1');
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
              //console.log('Respuesta: ',response.));
              return response.json();
            })
            .then(data => { 
              console.log('debug 2');
              console.log('Success:', data);
                if (data.status === 'success') { 
                  console.log('debug 3');
                    alert('Producto eliminado correctamente');
                } else { 
                  console.log('debug 4');
                    console.error('Error:', data); 
                    alert('Error al eliminar el producto: ' + (data.message || 'Unknown error')); 
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar el producto: ' + error.message); 
            });
        });


        tr.appendChild(button1);
        tr.appendChild(button2);
        productTable.appendChild(tr);

    });
};

  function createProduct() {
    event.preventDefault();
    const form = document.querySelector('.createProductForm');
  
    const product = {
      name: form.querySelector('#name').value,
      price: form.querySelector('#price').value,
      last_price: form.querySelector('#last_price').value,
      image: form.querySelector('#image').value,
      type: form.querySelector('#type').value,
      promo: form.querySelector('#promo').value
    };
  
    console.log("JSON enviado:", JSON.stringify(product)); 
    fetch('API/createProductsAPI.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(product)
    })
    .then(response => {
      console.log('debug 1');
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      //console.log('Respuesta: ',response.));
      return response.json();
    })
    .then(data => { 
      console.log('debug 2');
      console.log('Success:', data);
        if (data.status === 'success') { 
          console.log('debug 3');
            alert('Producto creado correctamente');
        } else { 
          console.log('debug 4');
            console.error('Error:', data); 
            alert('Error al crear el producto: ' + (data.message || 'Unknown error')); 
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al crear el producto: ' + error.message); 
    });
  }

  const openModalButtons = document.querySelectorAll('[data-modal-target]');
  const closeModalButtons = document.querySelectorAll('[data-close-button]');
  const overlay = document.getElementById('overlay');

  const createButton = document.getElementById('createProductButton');
  createButton.addEventListener('click', createProduct);


  openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.querySelector(button.dataset.modalTarget);
      openModal(modal);
    });
  });

  overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal-parent.active');
    modals.forEach(modal => {
      closeModal(modal);
    });
  });

  closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = button.closest('.modal-parent');
      closeModal(modal);
    });
  });

  function openModal(modal) {
    if (modal == null) return;
    modal.classList.add('active');
    overlay.classList.add('active');
  }

  function closeModal(modal) {
    if (modal == null) return;
    modal.classList.remove('active');
    overlay.classList.remove('active');
  }

  
  getProductsAPI()
   .then(products => displayProducts(products));