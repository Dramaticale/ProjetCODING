module.exports = {
    'Accéder au forum' : function(browser){
        browser.windowMaximize()
        browser.url('http://localhost/ProjetCODING/Accueil/')
        browser.waitForElementVisible('#username')
        browser.setValue('#username', 'Membre0')
        browser.setValue('#password', 'Membre0')
        browser.click('body > div > div:nth-child(2) > div > form > div.bouton > button')
        browser.waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(5) > a')
        browser.click('#navbarSupportedContent > ul > li:nth-child(5) > a')
    },

    'Créer un sujet' : function(browser){
        browser.waitForElementVisible('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.click('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.creation-title-topic')
        browser.setValue('.creation-title-topic', 'Ceci est un sujet de test créé par un utilisateur membre !')
        browser.setValue('.creation-answer-topic', 'Hello World ...')
        browser.waitForElementVisible('#submit-creation-topic')
        browser.click('#submit-creation-topic')
        browser.waitForElementVisible('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)')
        browser.expect.element('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)').text.to.equals('Ceci est un sujet de test créé par un utilisateur membre !')
        browser.pause(500)
        browser.click('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.box-title-topic')
        browser.expect.element('.box-title-topic').text.to.equals('Ceci est un sujet de test créé par un utilisateur membre !')
        browser.expect.element('.message-auteur').text.to.equals('Membre0')
        browser.expect.element('.message-zone-texte').text.to.equals('Hello World ...')
        browser.end()
    },
}