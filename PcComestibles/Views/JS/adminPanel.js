function getUsersAPI() {
  return fetch('API/usersAPI.php/getUsers')
    .then(response => {
      if (!response.ok) {
        throw new Error('La API no respondió correctamente');
      }
      return response.json();
    })
    .catch(error => console.error('Error:', error));
    
}

function displayUsers(users) {
    const table = document.getElementById('usersTable');
    console.log(users);
    users.forEach(user => {
        const tr = document.createElement('tr');
        tr.id = 'user'+user['producto_ID'];
        for (const content in user) {
            if (content === 'user_ID') {
              const td = document.createElement('td');
              td.textContent = user[content];
              tr.appendChild(td);
            } else {
              if(content === 'password') {
                const input = document.createElement('input');
                input.value = "********";
                tr.appendChild(input);
              }else {
                const input = document.createElement('input');
                input.value = user[content];
                tr.appendChild(input);
              }
            }
          }
        const button1 = document.createElement('button');
        const button2 = document.createElement('button');
        button1.textContent = 'Guardar';
        button1.value = user['id'];
        button2.textContent = 'Eliminar';
        button2.value = user['id'];

        button1.addEventListener('click', function() {

          const row = this.parentElement;

          ID = row.firstChild.textContent;

          const inputs = row.querySelectorAll('input');
          
          const user = {
            username: inputs[0].value,
            password: inputs[1].value,
            range: inputs[2].value,
            user_ID: ID
          };

          console.log(user)

          fetch('API/modifyUser.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(user)
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('La API no respondió correctamente');
            }
            return response.json();
          })
          .catch(error => console.error('Error:', error));
        });

        button2.addEventListener('click', function() {

          const row = this.parentElement;
    
          ID = row.firstChild.textContent;
          
          const user = {
            user_ID: ID
          };
    
          console.log(user)
    
          fetch('API/deleteUser.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(user)
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('La API no respondió correctamente');
            }
            return response.json();
          })
          .catch(error => console.error('Error:', error));
        });

      tr.appendChild(button1);
      tr.appendChild(button2);
      table.appendChild(tr);
    });
}



getUsersAPI()
 .then(users => displayUsers(users))
