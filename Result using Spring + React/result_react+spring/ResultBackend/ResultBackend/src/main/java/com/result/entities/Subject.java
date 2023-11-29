package com.result.entities;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Subject {
	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;
    private int midSemMarks;
    private int endSemMarks;
	public Subject(Long id, String name, int midSemMarks, int endSemMarks) {
		super();
		this.id = id;
		this.name = name;
		this.midSemMarks = midSemMarks;
		this.endSemMarks = endSemMarks;
	}
	public Subject() {
		super();
		// TODO Auto-generated constructor stub
	}
	public Long getId() {
		return id;
	}
	public void setId(Long id) {
		this.id = id;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public int getMidSemMarks() {
		return midSemMarks;
	}
	public void setMidSemMarks(int midSemMarks) {
		this.midSemMarks = midSemMarks;
	}
	public int getEndSemMarks() {
		return endSemMarks;
	}
	public void setEndSemMarks(int endSemMarks) {
		this.endSemMarks = endSemMarks;
	}
    
    
}
