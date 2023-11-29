package com.result.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import com.result.entities.Result;

public interface ResultRepository extends JpaRepository<Result, Long> {
	Result findByPrn(String prn);
}
