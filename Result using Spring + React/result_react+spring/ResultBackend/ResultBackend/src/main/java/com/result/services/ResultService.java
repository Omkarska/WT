package com.result.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.result.dao.ResultRepository;
import com.result.entities.Result;
import com.result.entities.Subject;

@Service
public class ResultService {
	 private final ResultRepository resultRepository;
	    private final SubjectService subjectService;

	    @Autowired
	    public ResultService(ResultRepository resultRepository, SubjectService subjectService) {
	        this.resultRepository = resultRepository;
	        this.subjectService = subjectService;
	    }

	    public Result addResult(Result result) {
	        List<Subject> subjects = result.getSubjects();
	        
	        for (Subject subject : subjects) {
	            // Save each subject before saving the result
	       //Subject sb = new Subject(subject.getId(),subject.getName(),subject.getMidSemMarks(),subject.getEndSemMarks());
	            subjectService.addSubject(subject);
	        }

	        return resultRepository.save(result);
	    }
	    public Result getResultByPrn(String prn) {
	        return resultRepository.findByPrn(prn);
	    }
}
