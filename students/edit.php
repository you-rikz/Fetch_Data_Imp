<?php

include ("../init.php");
use Models\Student;

	$_id = $_GET['_id'];
    $ID = new MongoDB\BSON\ObjectId("$_id");

	$student = new Student('','','','','','','','');
	$student->setConnection($connection);
	$edit_record = $student->getById($ID);


    $_id = $edit_record->_id;
    $studentId = $edit_record->studentId;
    $firstName = $edit_record->firstName;
    $lastName = $edit_record->lastName;
    $birthdate = $edit_record->birthdate;
    $address = $edit_record->address;       
    $program = $edit_record->program;
    $contactNumber = $edit_record->contactNumber;
    $emergencyContact = $edit_record->emergencyContact;


	// $first_name = $student->getFirstName;
	// $last_name = $student->getLastName;
	// $student_number = $student->getStudentNumber;
	// $email = $student->getEmail;
	// $contact = $student->getContact;
	// $program = $student->getProgram;

    // $all_students = $student->showAllStudents;
	
	// echo $mustache->render('student/edit', compact('student'));

    $template = $mustache->loadTemplate('edit.mustache');
    echo $template->render(compact('edit_record', '_id', 'studentId', 'firstName', 'lastName', 'birthdate', 'address', 'program', 'contactNumber','emergencyContact'));

?>