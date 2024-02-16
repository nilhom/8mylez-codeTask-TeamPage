import template from './team-page-index.html.twig';

const { Component } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('team-page-index', {
    template,

    inject :[
        'repositoryFactory'
    ],

    data(){
        return {
            repository: null,
            teamMembers: null
        }
    },

    metaInfo(){
        return {
          title: this.$createTitle(),
        };
    },

    computed: {
        columns(){
            return this.getColumns();
        }
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.repository = this.repositoryFactory.create('team_member');

            this.repository.search(new Criteria(), Shopware.Context.api).then((result) =>{
                this.teamMembers = result;
            })
        },
        getColumns(){
            return [
                {
                    property: 'name',
                    label: this.$tc('team-page.index.columnName'),
                    routerLink: 'team.page.detail',
                    inlineEdit: 'string',
                    allowResize: true,
                    primary: true
                },
                {
                    property: 'job',
                    label: this.$tc('team-page.index.columnJob'),
                    inlineEdit: 'string',
                    allowResize: true,
                },
                {
                    property: 'picture',
                    label: this.$tc('team-page.index.columnPicture'),
                    inlineEdit: 'string',
                    allowResize: true,
                },
            ]
        }
    },
})