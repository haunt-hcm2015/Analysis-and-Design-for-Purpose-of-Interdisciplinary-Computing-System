# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Student(models.Model):
    _name = 'student'
    _description = 'Student Model'
    first_name = fields.Char('First Name')
    middle_name  = fields.Char('Middle Name')
    last_name = fields.Char('Last Name')
    birth_date = fields.Date('DOB')
    image = fields.Image('Student Image')
    contact_phone = fields.Char('Phone Number')
    contact_mobile = fields.Char('Mobile Phone')
    contact_mail  = fields.Char('Email')
    student_category_id = fields.Many2one('student.category')
class StudentCategory(models.Model):
    _name = 'student.category'
    _description = 'Student Category Model'
    _rec_name = 'category_name'
    category_name = fields.Char('Category Name')







    

