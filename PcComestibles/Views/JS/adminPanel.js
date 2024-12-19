fetch('') // El fetch funciona como una llamada por url a traves de PHP !IMPORTANTE
.then(response => {
    return response.json()
})
.then(response => console.log(response))