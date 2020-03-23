# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Subject(models.Model):
    _name = 'school.subject'
    _description = 'Subject Model'
    name = fields.Char()
    abbr = fields.Char('Subject Abbreviation')
    area_id = fields.Many2one('school.subject.area', string='Area')
class SubjectGrade(models.Model):
    _name = 'school.subject.grade'
    _description = 'Subject Grade Model'
    subject_id = fields.Many2one('school.subject', string='Subject')
    grade_id = fields.Many2one('school.grade', string='Grade')
class Area(models.Model):
    _name = 'school.subject.area'
    _description = 'Subject Area Model'
    name = fields.Char()
