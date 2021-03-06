module.exports = {
    'enregistrer' : function(browser){
        browser
            .url('http://localhost/ProjetCODING/Accueil/')
            .waitForElementVisible('body > div > div:nth-child(2) > div > form > div.inscription > a')
            .click('body > div > div:nth-child(2) > div > form > div.inscription > a')
            .waitForElementVisible('#username')
            .waitForElementVisible('#password')
            .waitForElementVisible('#confirm_password')
            .setValue('#username', 'JeanJacques')
            .pause(2000)
            .setValue('#password', 'JeanJacques51100')
            .pause(2000)
            .setValue('#confirm_password','JeanJacques51100')
            .pause(2000)
            .click('#ajout')
    },
    'se connecter' : function(browser){
        browser
            .url('http://localhost/ProjetCODING/Accueil')
            .waitForElementVisible('#username')
            .waitForElementVisible('#password')
            .setValue('#username','JeanJacques')
            .setValue('#password', 'JeanJacques51100')
            .click('body > div > div:nth-child(2) > div > form > div.bouton > button')
            .pause(3000)
            .waitForElementVisible('#navbarSupportedContent > ul > li.nav-item.deconnexion')
            .expect.element('#navbarSupportedContent > ul > li.nav-item.deconnexion').text.to.contain('Bonjour JeanJacques !')
    },
    'navigation' : function(browser){
        browser
            .url('http://localhost/ProjetCODING/Accueil')
            .waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(2) > a')
            .click('#navbarSupportedContent > ul > li:nth-child(2) > a')
            .pause(2000)
            .waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(4) > a')
            .click('#navbarSupportedContent > ul > li:nth-child(4) > a')
            .pause(2000)
            .waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(5) > a')
            .click('#navbarSupportedContent > ul > li:nth-child(5) > a')
            .pause(2000)
            .waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(3) > a')
            .click('#navbarSupportedContent > ul > li:nth-child(3) > a')
    },
    'creation personnage' : function(browser){
        browser
            .url('http://localhost/ProjetCODING/Accueil/creationPerso.php')
            .pause(2000)            
            .useXpath()
            .waitForElementVisible('//*[@id="nom"]')
            .setValue('//*[@id="nom"]', 'JeanJacques')
            .useCss()
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqPlus')
            .pause(500)
            .click('#atqMoins')
            .pause(500)
            .click('#atqMoins')
            .pause(500)
            .click('#atqMoins')
            .pause(2000)
            .expect.element('#atq').text.to.contain('7')
            browser
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(500)
                .click('#viePlus')
                .pause(2000)
            .expect.element('#vie').text.to.contain('8')
            browser
                .click('body > div > div > div > form > button')
    },
    'jouer': function(browser){
        browser
            .url('http://localhost/ProjetCODING/Accueil/jeu.php')
            .pause(2000)
            .expect.element('body > div > div.infosPerso').text.to.contain('JeanJacques')
            browser.expect.element('body > div > div.infosPerso').text.to.contain('7')
            browser.expect.element('body > div > div.infosPerso').text.to.contain('8')
    }
}