const { Component } = Shopware;

Component.extend('team-page-create', 'team-page-detail', {
    methods:{
        getTeamMember(){
            this.teamMembers = this.repository.create(Shopware.Context.api);
        },

        onClickSave(){
            this.isLoading = true;

            this.repository.save(this.teamMembers, Shopware.Context.api).then(()=>{

                this.isLoading = false;
                this.$router.push({ name: 'team.page.detail', params: { id: this.teamMembers.id}});

            }).catch((exception)=>{

                this.isLoading = false;
                this.createNotificationError({
                    title: this.$tc('team-page.detail.errorTitle'),
                    message: exception
                })

            })
        }
    }
})