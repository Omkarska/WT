package com.result.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.result.entities.Result;
import com.result.services.ResultService;
import com.result.services.SubjectService;


@RestController
@CrossOrigin(origins = "http://localhost:3000", allowedHeaders = "*", exposedHeaders = "X-Get-Header")
@RequestMapping("/api/students")	
public class ResultController {

    @Autowired
    private ResultService resultService;
    
    @Autowired
    private SubjectService subjectService;

    @PostMapping
    public ResponseEntity<Result> addStudentResult(@RequestBody Result result) {
        Result savedResult = resultService.addResult(result);
        return new ResponseEntity<>(savedResult, HttpStatus.CREATED);
    }
    


    @GetMapping("/{prn}")
    public ResponseEntity<Result> getStudentResult(@PathVariable String prn) {
        Result result = resultService.getResultByPrn(prn);
        if (result != null) {
            return new ResponseEntity<>(result, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }
}
