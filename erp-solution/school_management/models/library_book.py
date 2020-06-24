# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class LibraryBook(models.Model):
    _name = 'school.library.book'
    _description = 'Book at Library Model'
    library_ids = fields.Many2many('school.library', string='Library Information')
    book_id = fields.Many2one('school.book', string='Book Information')
    quantity_in_stock = fields.Integer('Quantity in Stock') 
class Book(models.Model):
    _name = 'school.book'
    _description = 'Student Book, Library Book Model'
    author_ids = fields.Many2many('citizen', string='Author Book')
    book_type_id = fields.Many2one('school.book.type', string='Book Type') 
    publisher_id = fields.Many2one('school.publishing.company', string='Publish Company')
    isbn = fields.Char('ISBN Number')
    book_title = fields.Char('Book Title')
    total_page = fields.Integer('Total Page')
    rating = fields.Integer()
    language_ids = fields.Many2many('school.book.language', string='Book Language')
    published_date = fields.Date('Published Date')
    date_of_purchased = fields.Date('Date of Purchased')
class BookType(models.Model):
    _name = 'school.book.type'
    _description = 'Book Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
class Language(models.Model):
    _name = 'school.book.language'
    _description = 'Book Language Model'
    name = fields.Char()
    code = fields.Char()



