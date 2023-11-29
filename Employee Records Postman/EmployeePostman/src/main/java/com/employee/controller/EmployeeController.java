package com.employee.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.employee.entities.Employee;
import com.employee.service.EmployeeService;

@RestController
@RequestMapping("/api/employee")
public class EmployeeController {
	
	@Autowired
	EmployeeService employeeService;
	
	@PostMapping("/save-record")
	public ResponseEntity<Employee> saveRecord(@RequestBody Employee employee )
	{
		Employee emp = employeeService.saveRecord(employee);
		return new ResponseEntity<>(emp , HttpStatus.OK);
	}
	
	@GetMapping("/search-record/{empid}")
	public ResponseEntity<Employee> searchRecord(@PathVariable int empid)
	{
		Employee emp = employeeService.searchRecord(empid);
		return new ResponseEntity<>(emp ,HttpStatus.OK);
	}
	
	@GetMapping("/get-record")
	public ResponseEntity<List<Employee>> getRecords()
	{
		List<Employee> empList = employeeService.getRecords();
		return new ResponseEntity<List<Employee>>(empList , HttpStatus.OK);
	}

}
