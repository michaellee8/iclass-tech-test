<template>
    <li class="page-item" v-bind:class="{disabled:isLinkDisabled, active:isLinkActive, 'd-none':isDisplayNone }">
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
        DisplayNone: Boolean,
        onNavigationLinkClick: {
            type: Function
        }
    },
    data(){
        var isLinkDisabled = this.LinkName==="..."
        var isLinkActive = this.LinkName===this.CurrentPageNavigating.toString()
        var isDisplayNone = this.DisplayNone
        return {
            isLinkDisabled,
            isLinkActive,
            PageToBeNavigated: this.CurrentPageNavigating,
            isDisplayNone,
        }
    },
    methods: {
        onLinkClick(){
            if(this.LinkName==='<'&&this.CurrentPageNavigating>1){
                this.PageToBeNavigated = this.PageToBeNavigated-1
                this.$emit('ChangePage', this.PageToBeNavigated)
                console.log('triggere')
            } else if (this.LinkName==='>'&&this.CurrentPageNavigating<this.MaxPageCount){
                this.PageToBeNavigated = this.PageToBeNavigated+1
                this.$emit('ChangePage', this.PageToBeNavigated)
            } else if (Number.isInteger(parseFloat(this.LinkName))){
                this.PageToBeNavigated = parseFloat(this.LinkName)
                this.$emit('ChangePage', this.PageToBeNavigated)
            }
            console.log(this.CurrentPageNavigating)
            console.log(this.LinkName)
        }
    },
    watch:{
        CurrentPageNavigating(){
            this.isLinkActive = this.LinkName===this.CurrentPageNavigating.toString()
            this.PageToBeNavigated = this.CurrentPageNavigating
            this.isDisplayNone = this.DisplayNone
        }

    },
    beforeMount(){
        console.log(this.isDisplayNone)
        console.log(this.DisplayNone)
    }
}
</script>

<style>

</style>