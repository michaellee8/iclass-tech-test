<template>
    <div>
        <search-form v-on:EmployeeSearch="onEmployeeSearch($event)"></search-form>
        <employees-table v-bind:Employees="Employees"></employees-table>
        <page-navigation v-bind:NumberOfEmployeeRow="NumberOfEmployeeRow" v-bind:NumberOfEmployee="NumberOfEmployee" v-bind:CurrentPage="CurrentPage" v-on:ChangePage="onChangePage($event)"></page-navigation>
        <employees-number-option v-on:changeNumberOfEmployeeRowOption="onChangeNumberOfEmployeeRowOption($event)"></employees-number-option>
    </div>
</template>

<script>
    import SearchForm from './SearchForm/SearchForm'
    import EmployeesTable from './EmployeesTable/EmployeesTable'
    import PageNavigation from './PageNavigation/PageNavigation'
    import EmployeesNumberOption from './EmployeesNumberOption/EmployeesNumberOption'

    export default {
        name: 'main-container',
        components: {
           SearchForm,
           EmployeesTable,
           PageNavigation,
           EmployeesNumberOption,
        },

        data(){
            return {
                Employees: [],
                NumberOfEmployeeRow: 5,
                NumberOfEmployee: 50,
                CurrentPage: 1,
            }
        },

        methods:{

            async fetchEmployees(){
                this.Employees = this.Employees.slice(0,0)
                const rawDataFetched = await fetch(`api/employees/get/${(this.CurrentPage-1)*this.NumberOfEmployeeRow + 1}/${this.CurrentPage*this.NumberOfEmployeeRow}`)
                const employeesFetched = await rawDataFetched.json()
                employeesFetched.forEach(employee=>{
                    this.Employees.push(employee)
                })
                console.log(this.Employees)
            },
            async fetchNumberOfEmployee(){
                const rawDataFetched = await fetch(`api/employees/count`)
                const numberOfEmployeeFetched = await rawDataFetched.json()
                this.NumberOfEmployee = numberOfEmployeeFetched[0].number_of_employees
            },
            async fetchEmployesSearchResult(InputText){
                this.Employees = this.Employees.slice(0,0)
                const rawDataFetched = await fetch(`api/employees/search/${(this.CurrentPage-1)*this.NumberOfEmployeeRow + 1}/${this.CurrentPage*this.NumberOfEmployeeRow}/${InputText}`)
                const employeesResultFetched = await rawDataFetched.json()
                employeesResultFetched.forEach(employee=>{
                    this.Employees.push(employee)
                })
            },

            onChangeNumberOfEmployeeRowOption(newValue){
                this.NumberOfEmployeeRow = newValue;
            },
            onChangePage(newValue){
                this.CurrentPage = newValue
                console.log(this.CurrentPage)
            },
            onEmployeeSearch(newValue){
                this.fetchEmployesSearchResult(newValue)
            }

        },
        
        watch:{

            NumberOfEmployeeRow: function(newValue, oldValue){
                this.fetchEmployees()
            },
            CurrentPage: function(){
                this.fetchEmployees()
            },
        },

        beforeMount(){
            this.fetchEmployees()
            this.fetchNumberOfEmployee()
        },
    }
</script>
