<?php 

$mysqli = new mysqli("localhost:3306", "jordan", "jordanho", "employees");

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
};

$sql="
select dept_name, concat(first_name, ' ', last_name) as name, gender, salaries.salary, TIMESTAMPDIFF(year, dept_manager.from_date, CURDATE()) as served_for, count(dept_emp.emp_no) as employees_count, sum(salaries.salary) as employees_salary
from dept_manager
inner join employees
on dept_manager.emp_no=employees.emp_no
inner join departments
on dept_manager.dept_no = departments.dept_no
inner join salaries
on dept_manager.emp_no=salaries.emp_no
inner join dept_emp
on departments.dept_no=dept_emp.dept_no
where dept_manager.to_date>=CURDATE() AND salaries.to_date>=CURDATE() AND dept_emp.to_date>=CURDATE()
group by departments.dept_name;
";

class dept_manager_data {

  public $dept_name;
  public $name;
  public $gender;
  public $salary;
  public $served_for;
  public $employees_count;
  public $employees_salary;

  function __construct($dept_name, $name, $gender, $salary, $served_for, $employees_count, $employees_salary) {
    $this->dept_name = $dept_name;
    $this->name = $name;
    $this->gender = $gender;
    $this->salary = $salary;
    $this->served_for = $served_for;
    $this->employees_count = $employees_count;
    $this->employees_salary = $employees_salary;
  }

  function return_dept_manager_data_template() {
    $EmployeeTemplate = "
      <div>
        <div class='Column $this->gender' onmouseenter='showInfoBox(event)' onmouseleave='hideInfoBox(event)' onmousemove='changeInfoBoxPosition(event)'>
            <h2 class='FloatLeft'>$this->dept_name</h2>
            <h2 class='FloatLeft'>$this->name</h2>
            <h2 class='FloatRight'>$this->salary</h2>
            <h2 class='FloatRight'>$this->served_for</h2>
        </div>
        <div class='Pop DisplayNone' id='$this->dept_name'>
          <p>$this->employees_count under this manager</p>
          <p>$$this->employees_salary spent on them totally</p>
        </div>
      </div>
      ";
      return $EmployeeTemplate;
  }



}

$result = $mysqli->query($sql);

function construct_HTML($result){
  if ($result->num_rows > 0) {
    // output data of each row
    $HTML="";
    while($row = $result->fetch_assoc()) {
      $dept_manager_data = new dept_manager_data($row["dept_name"], $row["name"], $row["gender"], $row["salary"], $row["served_for"], $row["employees_count"], $row["employees_salary"]);
      $HTML=$dept_manager_data->return_dept_manager_data_template().$HTML;
    }
    return $HTML;
  }
}


$dept_manager_columns=construct_HTML($result);

$HTMLTemplate = "
  <!DOCTYPE html>
  <html>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Document</title>
          <link rel='stylesheet' type='text/css' href='style.css'>
          <script src='script.js'></script> 
          <title>Document</title>
      </head>
      <body>
          <div class='Container'>
              <div class='Column'>
                  <h2>Department</h2>
                  <h2>Name</h2>
                  <h2>Salary</h2>
                  <h2>Served for</h2>
              </div>
              $dept_manager_columns
          </div>
      </body>
  </html> 
";

echo $HTMLTemplate;

$mysqli -> close();

?> 