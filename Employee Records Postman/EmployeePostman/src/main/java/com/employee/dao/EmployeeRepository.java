package com.employee.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import com.employee.entities.Employee;

public interface EmployeeRepository extends JpaRepository<Employee, Long> {
	Employee findByempId(int empId);
}
