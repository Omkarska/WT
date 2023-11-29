package com.electricity.service;

public class ElectricityService {
	public int calculate(int units) {
		
			int amount = units;
			int bill=0;
			if(amount>0 && amount<=50)
				bill = amount*3;
			else if(amount>50 && amount<=150)
				bill = 50*3+(amount-50)*4;
			else if(amount>150 && amount<=250)
				bill = 50*3+100*4+(amount-150)*5;
			else
				bill = 50*3+100*4+100*5+(amount-250)*6;
			return bill;
		
	}
}
