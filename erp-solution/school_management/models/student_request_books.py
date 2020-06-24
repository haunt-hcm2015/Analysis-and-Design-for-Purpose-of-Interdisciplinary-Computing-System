# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
from . import parents 
class StudentRequestBook(models.Model):
    _name = 'school.student.request.book'
    _description = 'Student Request Book Model'
    student_id = fields.Many2one('school.student', string='Student Request')
    request_description = fields.Char('Request Description')
    book_id = fields.Many2one('school.book', string='Book Request')
    date_requested = fields.Date('Date Requested')
    







    

