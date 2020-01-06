import Model from './Model.js'
import Personnage from './Personnage.js'

const perso = new Personnage()

perso.hello()
const get = new Model()
const Perso = get.getPerso('Jacky')
console.log(get)
console.log(new Personnage())