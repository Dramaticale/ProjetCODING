module.exports = {
    'Accéder au forum' : function(browser){
        browser
            .windowMaximize()
            .url('http://localhost/ProjetCODING/Accueil/')
            .waitForElementVisible('#username')
            .setValue('#username', 'Membre0')
            .setValue('#password', 'Membre0')
            .click('body > div > div:nth-child(2) > div > form > div.bouton > button')
            .waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(5) > a')
    },

    'Créer un sujet' : function(browser){
        browser
            .waitForElementVisible('li.nav-item:nth-child(5)')
            .click('li.nav-item:nth-child(5)')
            .waitForElementVisible('body > main > div > div:nth-child(2) > div:nth-child(1)')
            .setValue('body > main > div > div:nth-child(2) > div:nth-child(1)', 'Ceci est un sujet de test créé par un utilisateur membre !')
            .setValue('body > main > div > div.zone-topic-creation > form > textarea', 'Hello World ...')
            .waitForElementVisible('body > main > div > div:nth-child(2) > div > a > div > div.text-title-topic')
            .click('body > main > div > div:nth-child(2) > div > a > div > div.text-title-topic')
            .waitForElementVisible('body > main > div > div.box-title-topic')
            .expect.element('body > main > div > div.box-title-topic').text.to.equal('Ceci est un sujet de test créé par un utilisteur membre !')
            .expect.element('body > main > div > div.box-message > div.message-zone-infos > div.message-auteur').text.to.equal('Membre0')
            .expect.element('body > main > div > div.box-message > div.message-zone-texte').text.to.equal('body > main > div > div.box-message > div.message-zone-texte')
            .end()
    },
}