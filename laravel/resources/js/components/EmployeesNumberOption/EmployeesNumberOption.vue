<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <select class="form-control" id="employees-number-option-select" v-on:change="onEmployeesNumberOptionChange()">
                    <option value="5">5 entries per page</option>
                    <option value="10">10 entries per page</option>
                    <option value="20">20 entries per page</option>
                    <option value="50">50 entries per page</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'employees-number-option',
    props: ["NumberOfEmployeeRowOption"],
    methods: {
        onEmployeesNumberOptionChange(){
            var EmployeesNumberOptionSelect = document.getElementById("employees-number-option-select")
            var selectedOption = EmployeesNumberOptionSelect.options[EmployeesNumberOptionSelect.selectedIndex].value
            console.log(selectedOption)
            this.$emit('changeNumberOfEmployeeRowOption', selectedOption)
        }
    }
}
</script>

<style>

</style>
