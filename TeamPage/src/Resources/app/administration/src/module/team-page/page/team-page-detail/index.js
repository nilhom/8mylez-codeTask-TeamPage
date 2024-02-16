import template from './team-page-detail.html.twig';

const { Component, Mixin } = Shopware;

Component.register('team-page-detail', {
    template,

    inject :[
        'repositoryFactory'
    ],

    mixins: [
      Mixin.getByName('notification')
    ],

    metaInfo(){
        return {
            title: this.$createTitle(),
        };
    },

    data(){
        return {
            teamMembers: null,
            isLoading: false,
            processSuccess: false,
            repository: null
        }
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.repository = this.repositoryFactory.create('team_member');
            this.getTeamMember();
        },

        getTeamMember(){
            this.repository.get(this.$route.params.id, Shopware.Context.api).then((entity)=>{
                this.teamMembers = entity;
            })
        },

        onClickSave(){
            this.isLoading = true;

            this.repository.save(this.teamMembers, Shopware.Context.api).then(()=>{
                this.getTeamMember();
                this.isLoading = false;
                this.processSuccess = true;
            }).catch((exception)=>{
                this.isLoading = false;
                this.createNotificationError({
                    title: this.$tc('team-page.detail.errorTitle'),
                    message: exception
                })
            })
        },

        saveFinish(){
            this.processSuccess = false;
        }
    },
})