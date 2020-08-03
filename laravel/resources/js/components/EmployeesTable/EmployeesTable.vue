<template>
    <div class="container my-1">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Employee No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Currently hired</th>
                    <th scope="col">Current salary</th>
                </tr>
            </thead>
            <tbody>
                <!-- <employee-row v-bind:employee-number="" v-bind:name="Jordan" v-bind:gender="M" v-bind:current-hired="True" v-bind:current-salary="123"></employee-row> -->
                <employee-row
                    v-for="employee in employees"
                    v-bind:key="employee.emp_no"
                    v-bind:emp_no="employee.emp_no"
                    v-bind:name="employee.name"
                    v-bind:gender="employee.gender"
                    v-bind:currently_hired="employee.currently_hired"
                    v-bind:salary="employee.salary"
                ></employee-row>
            </tbody>
        </table>
    </div>
</template>

<script>
import EmployeeRow from './EmployeeRow'
export default {
    name: 'employees-table',
    components: {
        EmployeeRow,
    },
    props:[
        "Employees",
    ],
    data(){
        return {
            employees: this.Employees
        }
    },
    watch:{
        Employees: function(newValue, oldValue){
            this.employees = this.Employees
        }
    },
}
</script>

<style>

</style>
