<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function get($start, $end){
        // $value = DeptEmp::all();
        // $value = DeptEmp::all()->take(10);

        // $employee = DB::table('employees')
        //                 ->join('dept_emp', 'emp_no', '=', 'dept_emp.emp_no')
        //                 ->join('salaries', 'dept_emp.emp_no', '=', 'salaries.emp_no')
        //                 ->join('salaries', 'dept_emp.to_date', '=', 'salaries.to_date')
        //                 ->skip(10)
        //                 ->take(5)
        //                 -get();
        $number_tobe_removed = $start-1;
        $number_tobe_gotted = $end - $number_tobe_removed;

        $sql_query = 
        "select employees.emp_no, concat(first_name, \" \", last_name) as name, gender, if(dept_emp.to_date>=curdate(), \"Yes\", \"No\") as currently_hired, salary
        from employees
        inner join dept_emp
        on employees.emp_no=dept_emp.emp_no
        inner join salaries
        on dept_emp.emp_no=salaries.emp_no and dept_emp.to_date=salaries.to_date
        limit $number_tobe_removed, $number_tobe_gotted;";

        $result = DB::select(DB::raw($sql_query));
        return $result;
        
    }

    public function count(){
        $sql_query = "select count(emp_no) as number_of_employees from dept_emp;";

        $result = DB::select(DB::raw($sql_query));
        return $result;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
