package com.result.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import com.result.entities.Subject;

public interface SubjectRepository extends JpaRepository<Subject, Long> {

}
