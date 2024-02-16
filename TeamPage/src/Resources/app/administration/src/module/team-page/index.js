import './page/team-page-index'
import './page/team-page-detail'
import './page/team-page-create'

import deDE from "./snippet/de-DE.json"
import enGB from "./snippet/en-GB.json"

const { Module } = Shopware;

Module.register("team-page", {
    type: 'plugin',
    name: 'team-page',
    title: 'team-page.general.mainMenuItemGeneral',
    description: 'team-page.general.descriptionTextModule',
    version: '1.0.0',
    targetVersion: '1.0.0',
    color: '#ff468C',
    favicon: 'icon-module-content.png',

    snippets: {
        'de-DE': deDE,
        'en-GB': enGB
    },

    routes: {
        index: {
            components: {
                default: 'team-page-index',
            },
            path: 'index',
        },
        detail:{
            components: {
                default: 'team-page-detail',
            },
            path: 'detail/:id',
            meta:{
                parentPath: 'team.page.index'
            }
        },
        create:{
            components: {
                default: 'team-page-create',
            },
            path: 'create',
            meta:{
                parentPath: 'team.page.index'
            }
        }
    },

    navigation: [{
        id: 'team-page',
        label: 'team-page.general.mainMenuItemGeneral',
        color: '#57D9A3',
        path: 'team.page.index',
        icon: 'default-shopping-paper-bag-product',
        parent: 'sw-content',
        position: 40
    }],

});
