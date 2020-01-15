module.exports = {
    'connexion': function(browser){
        browser
        .url('http://localhost/ProjetCODING/Accueil/')
        .pause(3000)
        .setValue('#username','Dramaticale')
        .setValue('#password', 'DreamTheater64')
        .click('body > div > div:nth-child(2) > div > form > div.bouton > button')
        .pause(3000)
        .waitForElementVisible('#navbarSupportedContent > ul > li.nav-item.deconnexion')
        .expect.element('#navbarSupportedContent > ul > li.nav-item.deconnexion').text.to.contain('Bonjour Dramaticale !')
        browser.pause(3000)

    }
}