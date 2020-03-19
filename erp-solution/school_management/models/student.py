# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
from . import parents 
class Student(models.Model):
    _name = 'school.student'
    _description = 'Student Model'
    first_name = fields.Char('First Name')
    middle_name  = fields.Char('Middle Name')
    last_name = fields.Char('Last Name')
    birth_date = fields.Date('DOB')
    image = fields.Image('Student Image')
    father_ids = fields.Many2many(comodel='parents', string='Father Name')
    mother_ids = fields.Many2many(comodel='parents', string='Mother Name')
    contact_phone = fields.Char('Phone Number')
    contact_mobile = fields.Char('Mobile Phone')
    contact_mail  = fields.Char('Email')
    student_category_id = fields.Many2one('student.category')
class StudentCategory(models.Model):
    _name = 'school.student.category'
    _description = 'Student Category Model'
    _rec_name = 'category_name'
    category_name = fields.Char('Category Name')







    

