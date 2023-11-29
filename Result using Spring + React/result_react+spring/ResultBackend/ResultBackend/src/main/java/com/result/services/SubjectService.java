package com.result.services;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.result.dao.SubjectRepository;
import com.result.entities.Subject;

@Service
public class SubjectService {
	 private final SubjectRepository subjectRepository;

	    @Autowired
	    public SubjectService(SubjectRepository subjectRepository) {
	        this.subjectRepository = subjectRepository;
	    }

	    public Subject addSubject(Subject subject) {
	        return subjectRepository.save(subject);
	    }
}
