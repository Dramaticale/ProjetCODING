username1 = 'Admin0'
username2 = 'Modo0'
username3 = 'Membre0'

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

    'Check Administrateur' : function(browser){
        browser.waitForElementVisible('.container > a:nth-child(7)')
        browser.expect.element('.container > a:nth-child(7)').text.to.equals('Gérer les statuts')
        browser.click('.container > a:nth-child(7)')
        browser.waitForElementVisible('.container > form:nth-child(1) > input:nth-child(2)')
        browser.setValue('.container > form:nth-child(1) > input:nth-child(2)', username3)
        browser.click('.container > form:nth-child(1) > input:nth-child(3)')
        browser.waitForElementVisible('.container > form:nth-child(3) > label:nth-child(1)')
        browser.expect.element('.container > form:nth-child(3) > label:nth-child(1)').text.to.equals(username3)
        browser.expect.element('.container > form:nth-child(3) > select:nth-child(2)').to.be.visible
        browser.expect.element('.container > form:nth-child(3) > select:nth-child(3)').to.be.visible
        browser.click('li.nav-item:nth-child(5) > a:nth-child(1)')
        browser.waitForElementVisible('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.click('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.text-title-topic')
        browser.click('.text-title-topic')
        browser.waitForElementVisible('div.box-message:nth-child(2) > div:nth-child(1) > a:nth-child(3)')
        browser.expect.element('div.box-message:nth-child(2) > div:nth-child(1) > a:nth-child(3)').text.to.equals('Supprimer le sujet')
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)').to.be.visible
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)').text.to.equals('Supprimer le commentaire')
        browser.click('li.nav-item:nth-child(6) > a:nth-child(1)')
    },

    'Check Modérateur' : function(browser){
        browser.waitForElementVisible('#username')
        browser.setValue('#username', username2)
        browser.setValue('#password', username2)
        browser.click('body > div > div:nth-child(2) > div > form > div.bouton > button')
        browser.waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(5) > a')
        browser.click('#navbarSupportedContent > ul > li:nth-child(5) > a')

        browser.waitForElementVisible('.container > a:nth-child(7)')
        browser.expect.element('.container > a:nth-child(7)').text.to.equals('Gérer les statuts')
        browser.click('.container > a:nth-child(7)')
        browser.waitForElementVisible('.container > form:nth-child(1) > input:nth-child(2)')
        browser.setValue('.container > form:nth-child(1) > input:nth-child(2)', username3)
        browser.click('.container > form:nth-child(1) > input:nth-child(3)')
        browser.waitForElementVisible('.container > form:nth-child(3) > label:nth-child(1)')
        browser.expect.element('.container > form:nth-child(3) > label:nth-child(1)').text.to.equals(username3)
        browser.expect.element('.container > form:nth-child(3) > select:nth-child(2)').to.be.visible
        browser.expect.element('.container > form:nth-child(3) > select:nth-child(3)').to.not.be.present
        browser.click('li.nav-item:nth-child(5) > a:nth-child(1)')
        browser.waitForElementVisible('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.click('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.text-title-topic')
        browser.click('.text-title-topic')
        browser.waitForElementVisible('div.box-message:nth-child(2) > div:nth-child(1) > a:nth-child(3)')
        browser.expect.element('div.box-message:nth-child(2) > div:nth-child(1) > a:nth-child(3)').text.to.equals('Supprimer le sujet')
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)').to.be.visible
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)').text.to.equals('Supprimer le commentaire')
        browser.click('li.nav-item:nth-child(6) > a:nth-child(1)')
    },

    'Check Modérateur' : function(browser){
        browser.waitForElementVisible('#username')
        browser.setValue('#username', username3)
        browser.setValue('#password', username3)
        browser.click('body > div > div:nth-child(2) > div > form > div.bouton > button')
        browser.waitForElementVisible('#navbarSupportedContent > ul > li:nth-child(5) > a')
        browser.click('#navbarSupportedContent > ul > li:nth-child(5) > a')

        browser.waitForElementVisible('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.expect.element('.container > a:nth-child(7)').to.not.be.present
        browser.click('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.text-title-topic')
        browser.click('.text-title-topic')
        browser.waitForElementVisible('div.box-message:nth-child(2)')
        browser.expect.element('div.box-message:nth-child(2) > div:nth-child(1) > a:nth-child(3)').to.not.be.present
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > a:nth-child(3)').to.not.be.present

        browser.click('li.nav-item:nth-child(6) > a:nth-child(1)')
        browser.end()
    }
}