export default class Model {
    getPerso(nom){
        fetch(`getPerso.php?nom=${nom}`)
            .then(response => {
                response.json().then(json => {
                    console.log(json)
                    return json
                }) 
            })
    }

    hello(){
        console.log('H')
    }
}