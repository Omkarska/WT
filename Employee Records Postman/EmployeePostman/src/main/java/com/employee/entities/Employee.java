package com.employee.entities;


import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Employee {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private long id;
	
	private int empId;
	private String empName;
	private int empSal;
	private String jobLoc;
	public Employee(long id, int empId, String empName, int empSal, String jobLoc) {
		super();
		this.id = id;
		this.empId = empId;
		this.empName = empName;
		this.empSal = empSal;
		this.jobLoc = jobLoc;
	}
	public Employee() {
		super();
		// TODO Auto-generated constructor stub
	}
	public long getId() {
		return id;
	}
	public void setId(long id) {
		this.id = id;
	}
	public int getEmpId() {
		return empId;
	}
	public void setEmpId(int empId) {
		this.empId = empId;
	}
	public String getEmpName() {
		return empName;
	}
	public void setEmpName(String empName) {
		this.empName = empName;
	}
	public int getEmpSal() {
		return empSal;
	}
	public void setEmpSal(int empSal) {
		this.empSal = empSal;
	}
	public String getJobLoc() {
		return jobLoc;
	}
	public void setJobLoc(String jobLoc) {
		this.jobLoc = jobLoc;
	}
	
	
}
