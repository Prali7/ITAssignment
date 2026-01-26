<?php
abstract class Person {
    protected $name;
    protected $email;
    protected $phone;

    public function __construct($name, $email, $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    abstract public function getRole();

    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
}

class Student extends Person {
    private $studentId;
    private $course;
    private $semester;
    private $marks = [];

    public function __construct($name, $email, $phone, $studentId, $course, $semester) {
        parent::__construct($name, $email, $phone);
        $this->studentId = $studentId;
        $this->course = $course;
        $this->semester = $semester;
    }

    public function addMarks($subject, $score) {
        $this->marks[$subject] = $score;
    }

    public function calculateGPA() {
        if (count($this->marks) == 0) return 0;
        return round(array_sum($this->marks) / count($this->marks), 2);
    }

    public function getRole() {
        return "Student";
    }

    public function getStudentId() { return $this->studentId; }
    public function getCourse() { return $this->course; }
    public function getSemester() { return $this->semester; }
    public function getMarks() { return $this->marks; }
}

class Teacher extends Person {
    private $teacherId;
    private $department;
    private $subjects = [];

    public function __construct($name, $email, $phone, $teacherId, $department) {
        parent::__construct($name, $email, $phone);
        $this->teacherId = $teacherId;
        $this->department = $department;
    }

    public function addSubject($subject) {
        $this->subjects[] = $subject;
    }

    public function getRole() {
        return "Teacher";
    }

    public function getTeacherId() { return $this->teacherId; }
    public function getDepartment() { return $this->department; }
    public function getSubjects() { return $this->subjects; }
}

$students = [];
$teachers = [];

$student1 = new Student("Alice", "alice@mail.com", "1234567890", "S101", "BSc CS", "5");
$student1->addMarks("Math", 85);
$student1->addMarks("Physics", 90);
$students[] = $student1;

$student2 = new Student("Bob", "bob@mail.com", "0987654321", "S102", "BSc IT", "3");
$student2->addMarks("Programming", 75);
$student2->addMarks("Databases", 80);
$students[] = $student2;

$teacher1 = new Teacher("Dr. Smith", "smith@mail.com", "111222333", "T201", "Computer Science");
$teacher1->addSubject("Math");
$teacher1->addSubject("Physics");
$teachers[] = $teacher1;

$teacher2 = new Teacher("Prof. John", "john@mail.com", "444555666", "T202", "IT Department");
$teacher2->addSubject("Programming");
$teacher2->addSubject("Databases");
$teachers[] = $teacher2;

echo "<h2>All Students</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Semester</th><th>Marks</th><th>GPA</th></tr>";
foreach ($students as $stu) {
    echo "<tr>";
    echo "<td>".$stu->getStudentId()."</td>";
    echo "<td>".$stu->getName()."</td>";
    echo "<td>".$stu->getEmail()."</td>";
    echo "<td>".$stu->getPhone()."</td>";
    echo "<td>".$stu->getCourse()."</td>";
    echo "<td>".$stu->getSemester()."</td>";
    echo "<td>";
    foreach ($stu->getMarks() as $subject => $score) {
        echo "$subject: $score<br>";
    }
    echo "</td>";
    echo "<td>".$stu->calculateGPA()."</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h2>All Teachers</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Department</th><th>Subjects</th></tr>";
foreach ($teachers as $teach) {
    echo "<tr>";
    echo "<td>".$teach->getTeacherId()."</td>";
    echo "<td>".$teach->getName()."</td>";
    echo "<td>".$teach->getEmail()."</td>";
    echo "<td>".$teach->getPhone()."</td>";
    echo "<td>".$teach->getDepartment()."</td>";
    echo "<td>".implode(", ", $teach->getSubjects())."</td>";
    echo "</tr>";
}
echo "</table>";
?>
