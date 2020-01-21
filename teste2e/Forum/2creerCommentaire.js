username1 = 'Membre0'

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

    'Répondre à un sujet' : function(browser){
        browser.waitForElementVisible('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.click('.container > div:nth-child(2) > div:nth-child(1) > a:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)')
        browser.click('div.box-link:nth-child(1) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1)')
        browser.waitForElementVisible('.answer-topic')
        browser.setValue('.answer-topic', 'C\'est pas faux !')
        browser.click('#submit-answer-topic')
        browser.waitForElementVisible('div.box-message:nth-child(3) > div:nth-child(1) > div:nth-child(1)')
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > div:nth-child(1)').text.to.equals('Membre0')
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(1) > div:nth-child(2)').text.to.match(/[0-9][0-9]:[0-9][0-9] [0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]/)
        browser.expect.element('div.box-message:nth-child(3) > div:nth-child(2)').text.to.equals('C\'est pas faux !')

        browser.click('li.nav-item:nth-child(6) > a:nth-child(1)')
        browser.end()
    }
}