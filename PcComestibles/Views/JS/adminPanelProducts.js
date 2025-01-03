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
          for (const content in products) {
              if (content === 'password') {
                  continue;
              }
              const td = document.createElement('td');
              td.textContent = products[content];
              tr.appendChild(td);
          }
          productTable.appendChild(tr);
      });
  }
  
  getProductsAPI()
   .then(products => displayProducts(products))