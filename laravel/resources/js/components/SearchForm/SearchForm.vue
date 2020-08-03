<template>
    <div class="container mt-2 mb-1">
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" v-on:click="searchButtonClick()">Search</button>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="=SearchText" aria-describedby="Input text here to search" placeholder="Input text here to search">
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: 'search-form',
    methods: {
        searchButtonClick(){
            console.log('Hello')
        }
    }
}
</script>
<style>
</style>
