<template>
  <div class="container">
      <div class="row">
          <div class="col-md-6">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'<'"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'1'" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'2'"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'3'"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>

                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'...'"  v-bind:DisplayNone="this.LinkDisplay" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(CurrentPage-2).toString()" v-bind:DisplayNone="this.LinkDisplay" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(CurrentPage-1).toString()" v-bind:DisplayNone="this.LinkDisplay" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(CurrentPage).toString()" v-bind:DisplayNone="this.LinkDisplay" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(CurrentPage+1).toString()" v-bind:DisplayNone="this.LinkDisplay" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(CurrentPage+2).toString()" v-bind:DisplayNone="this.LinkDisplay" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'...'"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>

                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="Math.ceil((NumberOfEmployee/NumberOfEmployeeRow)-2).toString()"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(Math.ceil(NumberOfEmployee/NumberOfEmployeeRow)-1).toString()" v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="(Math.ceil(NumberOfEmployee/NumberOfEmployeeRow)).toString()"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'>'"  v-bind:MaxPageCount="MaxPageCount" v-on:ChangePage="onChangePage($event)"></page-navigation-link>

                    </ul>
                </nav>
          </div>
      </div>
  </div>
</template>

<script>
import PageNavigationLink from './PageNavigationLink'
export default {
    name: 'page-navigation',
    components: {
        PageNavigationLink
    },
    props: [
        "NumberOfEmployeeRow",
        "NumberOfEmployee",
        "CurrentPage",
    ],
    data(){
        return {
            CurrentPageNavigating: this.CurrentPage,
            LinkDisplay: true,
            MaxPageCount: Math.ceil(this.NumberOfEmployee/this.NumberOfEmployeeRow),

        }
    },
    watch:{
        CurrentPage(){
            this.CurrentPageNavigating = this.CurrentPage
            this.MaxPageCount = Math.ceil(this.NumberOfEmployee/this.NumberOfEmployeeRow)
            if(this.CurrentPageNavigating<6 || this.CurrentPageNavigating-5>this.MaxPageCount){
                this.LinkDisplay = true
            } else {
                this.LinkDisplay = false
            }
            console.log(this.MaxPageCount)
        }
    },
    methods: {
        onChangePage(newValue){
            this.$emit('ChangePage', newValue)
        }
    },
}
</script>

<style>

</style>
