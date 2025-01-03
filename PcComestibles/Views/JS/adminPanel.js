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
        for (const content in user) {
            if (content === 'password') {
                continue;
            }
            const td = document.createElement('td');
            td.textContent = user[content];
            tr.appendChild(td);
        }
        table.appendChild(tr);
    });
}

getUsersAPI()
 .then(users => displayUsers(users))
