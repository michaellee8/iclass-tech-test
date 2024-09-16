<template>
  <div class="container">
      <div class="row">
          <div class="col-md-6">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'<'"  v-bind:MaxPageCount="MaxPageCount" v-on:changePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'1'" v-bind:MaxPageCount="MaxPageCount" v-on:changePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'2'"  v-bind:MaxPageCount="MaxPageCount" v-on:changePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'3'"  v-bind:MaxPageCount="MaxPageCount" v-on:changePage="onChangePage($event)"></page-navigation-link>
                        <page-navigation-link  v-bind:CurrentPageNavigating="this.CurrentPageNavigating" v-bind:LinkName="'...'"  v-bind:MaxPageCount="MaxPageCount" v-on:changePage="onChangePage($event)"></page-navigation-link>
                        <!-- <li class="page-item"><a class="page-link" href="#" v-on:click="onLinkClick(CurrentPage-1)"><</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link active" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>

                        <li class="page-item"><a class="page-link disabled" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{CurrentPage-2}}</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{CurrentPage-1}}</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{CurrentPage}}</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{CurrentPage+1}}</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{CurrentPage+2}}</a></li>
                        <li class="page-item"><a class="page-link disabled" href="#">...</a></li> -->

                        <!-- <li class="page-item"><a class="page-link" href="#">{{ Math.ceil(NumberOfEmployee/NumberOfEmployeeRow)-2 }}</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{ Math.ceil(NumberOfEmployee/NumberOfEmployeeRow)-1 }}</a></li>
                        <li class="page-item"><a class="page-link" href="#">{{ Math.ceil(NumberOfEmployee/NumberOfEmployeeRow) }}</a></li>
                        <li class="page-item"><a class="page-link" href="#">></a></li> -->
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
            MaxPageCount: Math.ceil(this.NumberOfEmployee/this.NumberOfEmployeeRow),
        }
    },
    methods: {
        onChangePage(newValue){
            console.log(newValue)
        }
    },
}
</script>

<style>

</style>
