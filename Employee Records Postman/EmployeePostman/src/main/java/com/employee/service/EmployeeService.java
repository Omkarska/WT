package com.employee.service;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.employee.dao.EmployeeRepository;
import com.employee.entities.Employee;
@Service
public class EmployeeService {
	
	@Autowired
	EmployeeRepository employeeRepository;
	
	public Employee saveRecord(Employee employee)
	{
		Employee emp = employeeRepository.save(employee);
		
		return emp;
	}
	
	public Employee searchRecord(int empid)
	{
		Employee emp = employeeRepository.findByempId(empid);
		return emp;
	}
	
	public List<Employee> getRecords()
	{
		
		return employeeRepository.findAll();
	}

}
