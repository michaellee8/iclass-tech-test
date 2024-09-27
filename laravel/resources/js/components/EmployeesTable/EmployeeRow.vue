<template>
    <tr>
        <th scope="row">{{ emp_no }}</th>
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ currently_hired }}</td>
        <td>{{ salary }}</td>
    </tr>
</template>

<script>
export default {
    name: 'employee-row',
    props: [
        "emp_no",
        "name",
        "gender",
        "currently_hired",
        "salary",
    ],
}
</script>

<style>

</style>
