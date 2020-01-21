username1 = 'Modo0'

module.exports = {
    'Accéder au forum' : function(browser){
        browser.windowMaximize()
        browser.url('http://localhost/ProjetCODING/Accueil/')
        browser.waitForElementVisible('#username')
        browser.setValue('#username', username1)
        browser.setValue('#password', username1)
        browser.click('body > div > div:nth-child(2) > div > form > div.bouton > button')
        browser.waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(5) > a')
        browser.click('#navbarSupportedContent > ul > li:nth-child(5) > a')
    },

    'Supprimer un commentaire' : function(browser){
        browser.waitForElementVisible('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.click('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.text-title-topic')
        browser.click('.text-title-topic')
        browser.waitForElementVisible('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)')
        browser.click('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)')
        browser.acceptAlert()
        browser.waitForElementVisible('div.box-message:nth-child(2)')
        browser.expect.element('div.box-message:nth-child(3)').to.not.be.present
        browser.back()
    },

    'Supprimer un sujet' : function(browser){
        browser.waitForElementVisible('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)')
        browser.click('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.delete')
        browser.click('.delete')
        browser.acceptAlert()
        browser.waitForElementVisible('.container')
        browser.expect.element('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)').to.not.be.present
        browser.expect.element('.no-topic').text.to.equals('Il n\'y a actuellement aucun sujet dans la sous-catégorie entraide, pourquoi ne pas être le premier à en créer un ?')

        browser.click('li.nav-item:nth-child(6) > a:nth-child(1)')
        browser.end()
    }
}