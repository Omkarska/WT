package com.electricity.controller;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.electricity.service.ElectricityService;

@RestController
@RequestMapping("/electricity")
@CrossOrigin
public class ElectricityController {
	ElectricityService es = new ElectricityService();
	
	@GetMapping("/calculate/{units}")	
	public int calc(@PathVariable int units)
	{
		int bill = es.calculate(units);
		return bill;
	}
	
}
