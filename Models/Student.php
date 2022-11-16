<?php

namespace Models;


class Student
{
	public $studentId;
	public $firstName;
	public $lastName;
    public $birthdate;
    public $address;
    public $program;
    public $contactNumber;
    public $emergencyContact;

	// Database Connection Object


    public function __construct($studentId, $firstName, $lastName, $birthdate, $address, $program, $contactNumber, $emergencyContact)
	{
		$this->studentId = $studentId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
        $this->address = $address;
        $this->program = $program;
        $this->contactNumber = $contactNumber;
        $this->emergencyContact = $emergencyContact;
        
        
	}

	
    public function getStudentId()
	{
		return $this->studentId;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function getBirthdate()
	{
		return $this->birthdate;
	}

    public function getAddress()
	{
		return $this->address;
	}

    public function getProgram()
	{
		return $this->program;
	}

    public function getContact()
	{
		return $this->contactNumber;
	}
    public function getEmergency()
	{
		return $this->emergencyContact;
	}

	public function setConnection($connection)
	{
		return $this->connection = $connection;
	}

    public function showAllStudents()
    {
        $displayStudent = $this->connection->find();
        return $displayStudent;
    }

	public function addStudent()
   	{
        	try {
                $insertOneStudent = $this->connection->insertOne([
                    'studentId' => $this->getStudentId(),
                    'firstName' => $this->getFirstName(),
                    'lastName' => $this->getLastName(),
                    'birthdate' => $this->getBirthdate(),
                    'address' => $this->getAddress(),
                    'program' => $this->getProgram(),
                    'contactNumber' => $this->getContact(),
                    'emergencyContact' => $this->getEmergency(),
                    
                    ]);
                } catch (Exception $e) {
                    error_log($e->getMessage());
                }
            }
	public function getById($ID) {
		try {
			$findOneStudent = $this->connection->findOne(['_id'=>$ID]);
				return $findOneStudent;
		
			} catch (Exception $e) {
				error_log($e->getMessage());
		}
	}

	public function updateStudent($ID, $studentId, $firstName, $lastName, $birthdate, $address, $program,$contactNumber, $emergencyContact ) {
		try {
			$updateOneStudent = $this->connection->updateOne(['_id'=>$ID],
			['$set'=>
			[
				'studentId' => $studentId,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'birthdate' => $birthdate,
				'address' => $address,
				'program' => $program,
				'contactNumber' => $contactNumber,
				'emergencyContact' => $emergencyContact,
			]]);

		}catch (Exception $e) {
			error_log($e->getMessage());
	}
	}
	public function removeStudent($ID){
		try{
			$student = $this->connection->deleteOne(['_id'=>$ID]);

			return $student;
		
		} catch (Exception $e) {
			error_log($e->getMessage());
		}

	}
}

