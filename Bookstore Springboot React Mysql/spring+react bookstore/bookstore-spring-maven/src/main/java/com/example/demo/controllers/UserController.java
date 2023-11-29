package com.example.demo.controllers;

import java.util.Collections;
import java.util.HashMap;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.dao.UserRepository;
import com.example.demo.entities.User;

@Controller
@CrossOrigin(origins = "*", allowedHeaders = "*", exposedHeaders = "*")
@RequestMapping("/user")
public class UserController {
	
	@Autowired
    private UserRepository ur;

	
	@PostMapping("/create")
	@ResponseBody
	public ResponseEntity<Map<String, Object>> createUser(@RequestBody User user) {
	    Map<String, Object> response = new HashMap<>();

	    if (user.getName() == null || user.getUsername() == null || user.getPassword() == null) {
	        response.put("message", "All fields are required");
	        return ResponseEntity.badRequest().body(response);
	    }

	    ur.save(user);

	    response.put("message", "User registered successfully!");
	    return ResponseEntity.ok(response);
	}
	
	@PostMapping("/login")
	@ResponseBody
	public ResponseEntity<Map<String, String>> verifyUser(@RequestBody User user) {
        if (user.getUsername() == null || user.getPassword() == null) {
            return ResponseEntity.badRequest().body(Collections.singletonMap("message", "All fields are required"));
        }

        User foundUser = ur.findByUsername(user.getUsername());

        if (foundUser != null && foundUser.getPassword().equals(user.getPassword())) {
            Map<String, String> response = new HashMap<>();
            response.put("message", "Login successful!");
            response.put("username", foundUser.getUsername());
            response.put("name", foundUser.getName());
            return ResponseEntity.ok(response);
        } else {
            return ResponseEntity.status(HttpStatus.UNAUTHORIZED).body(Collections.singletonMap("message", "Invalid credentials"));
        }
    }
}
