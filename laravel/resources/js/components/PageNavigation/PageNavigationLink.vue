<template>
    <li class="page-item" v-bind:class="{disabled:isLinkDisabled, active:isLinkActive}">
        <a class="page-link" href="#" v-on:click="onLinkClick()">{{ LinkName }}</a>
    </li>
</template>

<script>
export default {
    name: 'page-navigation-link',
    props: {
        LinkName: String,
        CurrentPageNavigating: Number,
        MaxPageCount: Number,
        onNavigationLinkClick: {
            type: Function
        }
    },
    data(){
        var isLinkDisabled = this.LinkName==="..."
        var isLinkActive = this.LinkName===this.CurrentPageNavigating.toString();
        return {
            isLinkDisabled,
            isLinkActive,
            PageToBeNavigated: this.CurrentPageNavigating
        }
    },
    methods: {
        onLinkClick(){
            if(this.LinkName==='<'&&this.CurrentPageNavigating>1){
                this.PageToBeNavigated = this.PageToBeNavigated-1
            } else if (this.LinkName==='>'&&this.CurrentPageNavigating<this.MaxPageCount){
                this.PageToBeNavigated = this.PageToBeNavigated+1
            } else {
                this.PageToBeNavigated = parseInt(this.LinkName)
            }
            
        }
    },
}
</script>

<style>

</style>