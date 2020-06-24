# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ClassSchool(models.Model):
    _name = 'school.class'
    _description = 'class Model'
    teacher_id = fields.Many2many('hr.employee')
    grade_id = fields.Many2one('school.grade')
    class_type_id = fields.Many2one('school.class.type')
    year = fields.Date()
    section = fields.Char()
    state = fields.fields.Selection([
        ('available', 'Available'),
        ('discipline', 'Discipline')
    ], string='State')
    remark = fields.Char()
class ClassType(models.Model):
    _name = 'school.class.type'
    _description = 'Class Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
class GradeSchool(models.Model):
    _name = 'school.grade'
    _description = 'Grade Model'
    name = fields.Char()
