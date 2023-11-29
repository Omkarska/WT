package com.example.demo.controllers;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.dao.BookRepository;
import com.example.demo.entities.Book;

@Controller
@CrossOrigin(origins = "*", allowedHeaders = "*", exposedHeaders = "*")
@RequestMapping("/books")
public class BookController {
	
	@Autowired
    private BookRepository br;

    @GetMapping("/get")
    @ResponseBody
    public ResponseEntity<List<Book>> fetchBooks() {
        List<Book> books = br.findAll();

        if (books.isEmpty()) {
            return ResponseEntity.noContent().build();
        }
        
        return ResponseEntity.ok(books);
    }
}
